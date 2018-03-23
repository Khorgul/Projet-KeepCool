package com.keepcool.keeptraining;

/**
 * Created by ff600900@iutnice.unice.fr on 23/03/18.
 */

public class Serie {

    private int charge;
    private int nb;

    public Serie(int charge, int nb){
        this.charge=charge;
        this.nb=nb;
    }

    public int getCharge() {
        return charge;
    }

    public int getNb() {
        return nb;
    }

    public void setCharge(int charge) {
        this.charge = charge;
    }

    public void setNb(int nb) {
        this.nb = nb;
    }
}
