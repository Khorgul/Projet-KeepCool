package com.keepcool.keeptraining;

/**
 * Created by ff600900@iutnice.unice.fr on 23/03/18.
 */

public class Exercice {

    private int number;
    private Machine machine;
    private String nom;

    public Exercice(int number, Machine machine, String nom){
        this.number=number;
        this.machine=machine;
        this.nom=nom;
    }

    public Machine getMachine() {
        return machine;
    }

    public String getNom() {
        return nom;
    }

    public int getNumber() {
        return number;
    }

    public void setMachine(Machine machine) {
        this.machine = machine;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public void setNumber(int number) {
        this.number = number;
    }
}
