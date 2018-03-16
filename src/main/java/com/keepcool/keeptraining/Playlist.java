package com.keepcool.keeptraining;

/**
 * Created by florian on 16/03/18.
 */

public class Playlist {

    private int id;
    private String nom;
    private int img;

    public Playlist(int id, String nom, int img) {
        this.id = id;
        this.nom = nom;
        this.img = img;
    }

    public int getId() {
        return id;
    }

    public int getImg() {
        return img;
    }

    public String getNom() {
        return nom;
    }
}
