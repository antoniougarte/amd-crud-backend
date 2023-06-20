<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

class ClientController extends Controller
{
    public function index()
    {
        $clients = DB::select('CALL getClients()');

        return response()->json($clients);
    }


    public function store(Request $request)
    {
        // Obtener los datos enviados en la solicitud
        $id = $request->input('id');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $dob = $request->input('dob');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $arrayPayment = json_encode($request->input('arrayPagos'));
        $arrayDelete = json_encode($request->input('arrayDelete'));

        //Llamada al procedimiento almacenado
        // DB::select('CALL addClient(?, ?, ?, ?, ?, ?)', [$firstName, $lastName, $dob, $email, $phone, $address]);
        $data= DB::select('CALL insertUpdateClients(?, ?, ?, ?, ?, ?, ?, ?, ?)', [$id, $firstName, $lastName, $dob, $email, $phone, $address, $arrayPayment, $arrayDelete]);

        //Devolver respuesta afirmativa
        return $data;
    }

    public function getPayments($id)
    {
        $payments = DB::select('CALL getClientPayments(?)', [$id]);

        return response()->json($payments);
    }

    public function storePayment(Request $request, $id)
    {
        // Obtener los datos enviados en la solicitud
        $payment = $request->input('payment');
        $transactionId = $request->input('transaction_id');
        $paymentDate = $request->input('payment_date');

        // Llamada al procedimiento almacenado
        DB::select('CALL addPayment(?, ?, ?, ?)', [$payment, $id, $transactionId, $paymentDate]);

        // Devolver respuesta afirmativa
        return response()->json(['message' => 'Pago agregado correctamente']);
    }

    public function updateClients( Request $request){
        
    }

    public function deleteClient($id)
    {
        DB::select('CALL deleteClient(?)', [$id]);
        return response()->json(['message' => 'Cliente marcado como eliminado correctamente']);
    }

    public function getTotal()
    {
        $clients = DB::select('CALL getTotalClients()');

        return response()->json($clients);
    }
        
    public function getClientDetails($id)
    {
        $clients = DB::select('CALL getClientDetails(?)', [$id]);

        // Verificar si se encontraron clientes
        if (count($clients) === 0) {
            return response()->json(['message' => 'No se encontró ningún cliente.']);
        }

        // Formatear los datos para una lectura clara
        $client = $clients[0];
        $formattedData = [
            'id' => $client->id,
            'first_name' => $client->first_name,
            'last_name' => $client->last_name,
            'dob' => $client->dob,
            'email' => $client->email,
            'phone' => $client->phone,
            'address' => $client->address,
            'payments' => json_decode($client->payments),
        ];

        return response()->json($formattedData);
    }


};