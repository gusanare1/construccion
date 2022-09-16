/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javagetmethod;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;

/**
 *
 * @author User
 */
public class Planta {
    private Date fechaPlantacion;
    private int porcentajeHumedad;
    private int clasePlanta;
    
    public Planta(int porcentajeHumedad, int clasePlanta)
    {
        this.fechaPlantacion = Calendar.getInstance().getTime();
        this.porcentajeHumedad = porcentajeHumedad;
        this.clasePlanta = clasePlanta;
    }

    public String getClasePlantaApi() {
        return String.valueOf(clasePlanta);
    }

    public String getPorcentajeHumedadApi() {
        return String.valueOf(porcentajeHumedad);
    }

    public String getFechaPlantacionApi() {
        
        System.out.println(fechaPlantacion.toString());
        DateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");
        return dateFormat.format(fechaPlantacion.getTime()); 
    }
    
    
    
    
}
