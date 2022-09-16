/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javagetmethod;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

/**
 *
 * @author Gustavo
 */
public class JavaGetMethod {
static final String apiKey = "qwerty";
    public static void SendDataToWS(Planta planta) throws IOException {
        if (planta != null)
        {
            String urlName = "http://localhost/construccion/ws/creacionNuevaPlantaRequest.php";
            URL urlForGetReq = new URL(urlName);
            String read;
            HttpURLConnection connection = (HttpURLConnection) urlForGetReq.openConnection();
            connection.setRequestMethod("POST");
            connection.setRequestProperty("apiKey", apiKey);
            connection.setRequestProperty("fechaPlantacion", planta.getFechaPlantacionApi());
            connection.setRequestProperty("porcentajeHumedad", planta.getPorcentajeHumedadApi());
            connection.setRequestProperty("clasePlanta", planta.getClasePlantaApi());
            int codeResponse = connection.getResponseCode();
            // checking whether the connection has been established or not  
            if (codeResponse == HttpURLConnection.HTTP_OK) {
            // reading the response from the server  
                InputStreamReader isrObj = new InputStreamReader(connection.getInputStream());
                StringBuilder responseStr;
                // to store the response from the servers
                try (BufferedReader bf = new BufferedReader(isrObj)) {
                    // to store the response from the servers
                    responseStr = new StringBuilder();
                    while ((read = bf.readLine()) != null) {
                        responseStr.append(read);
                    }
                    // closing the BufferedReader
                }
                // disconnecting the connection  
                connection.disconnect();
                // print the response  
                System.out.println("JSON String Result is: \n" + responseStr.toString());
            } else {
                System.out.println("Method did not work. Code: "+codeResponse);
            }
        }
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        try {
            // creating an object of the JavaGETExample class
            Planta planta = new Planta(12, 1);
            SendDataToWS(planta);
        } catch (IOException ex) {
            System.err.println("Error " + ex.toString());
        }
    }

}
