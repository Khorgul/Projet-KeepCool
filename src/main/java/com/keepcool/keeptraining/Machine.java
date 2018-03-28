package com.keepcool.keeptraining;

/**
 * Created by ff600900@iutnice.unice.fr on 23/03/18.
 */

public class Machine {

    private String nom;
    private int image;

    public Machine(String nom, int image){
        this.nom=nom;
        this.image=image;
    }

    public String getNom() {
        return nom;
    }

    public int getImage() {
        return image;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public void setImage(int image) {
        this.image = image;
    }
}
