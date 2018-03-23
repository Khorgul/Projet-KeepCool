package com.keepcool.keeptraining;

import java.util.ArrayList;

/**
 * Created by ff600900@iutnice.unice.fr on 23/03/18.
 */

public class ListExercice {

    private ArrayList<Exercice> list;

    public ListExercice() {
        list=new ArrayList<>();
    }

    public Exercice get(int position) {
        return list.get(position);
    }

    public int size() {
        return list.size();
    }

    public void build() {
    }
}
