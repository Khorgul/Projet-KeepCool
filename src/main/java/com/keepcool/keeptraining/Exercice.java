package com.keepcool.keeptraining;

/**
 * Created by ff600900@iutnice.unice.fr on 23/03/18.
 */

public class Exercice {

    private int number;
    private Machine machine;
    private String nom;
    private int chrono;

    public Exercice(int number, Machine machine, String nom, int chrono){
        this.number=number;
        this.machine=machine;
        this.nom=nom;
        this.chrono = chrono;
    }

    public Exercice(int number, Machine machine, int chrono){
        this.number=number;
        this.machine=machine;
        this.nom=machine.getNom();
        this.chrono = chrono;
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

    public int getChrono() {
        return chrono;
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

    public void setChrono(int chrono) {
        this.chrono = chrono;
    }
}
