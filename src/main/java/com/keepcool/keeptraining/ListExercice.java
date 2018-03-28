package com.keepcool.keeptraining;

import java.util.ArrayList;

/**
 * Created by ff600900@iutnice.unice.fr on 23/03/18.
 */

public class ListExercice {

    private ArrayList<Exercice> list;

    public ListExercice() {
        list=new ArrayList<>();
        build();
    }

    public Exercice get(int position) {
        return list.get(position);
    }

    public int size() {
        return list.size();
    }

    private void build() {
        Machine m = new Machine("nomMachine", R.drawable.ic_launcher_background);
        list.add(new Exercice(1, m, "nomExercice", 90));
        list.add(new Exercice(2, m, 90));
    }
}
