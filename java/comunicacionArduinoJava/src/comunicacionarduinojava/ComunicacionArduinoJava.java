/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package comunicacionarduinojava;

import com.panamahitek.ArduinoException;
import com.panamahitek.PanamaHitek_Arduino;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.util.Enumeration;
import java.util.logging.Level;
import java.util.logging.Logger;
import javagetmethod.Planta;
import jssc.SerialPort;
import jssc.SerialPortEvent;
import jssc.SerialPortEventListener;
import jssc.SerialPortException;

/**
 *
 * @author User
 */
public class ComunicacionArduinoJava {
 //Se crea una instancia de la librería PanamaHitek_Arduino
    
    public static void main(String[] args)
    {
        String comUsado = "COM4";
        try
        {
            comUsado = args[0];
        }
        catch(Exception ex)
        {
            System.out.println("El Puerto COM no ha sido enviado como parametro... se usara el default: "+comUsado);
        }
         try {
             PanamaHitek_Arduino ino = new PanamaHitek_Arduino();
             SerialPortEventListener listener = new SerialPortEventListener() {
        @Override
        public void serialEvent(SerialPortEvent spe) {
            try {
                Planta planta=null;
                if (ino.isMessageAvailable()) {
                    String str = ino.printMessage();
                    System.out.println(str);
                    if(str.contains("Humedad"))
                    {
                        int porcentajeHumedad = Integer.parseInt(str.split(":")[1]);
                        planta = new Planta(porcentajeHumedad, 1);
                    }
                }
                javagetmethod.JavaGetMethod.SendDataToWS(planta);
            } catch (SerialPortException | ArduinoException ex) {
                System.err.println("Error: "+ex.toString());
            } catch (IOException ex) {
                System.err.println("Error: "+ex.toString());
            }

        }
    };
            ino.arduinoRX(comUsado, 9600, listener);
        } catch (ArduinoException | SerialPortException ex) {
             System.err.println("Error en main: "+ex.toString());
        }
    }
    
}
