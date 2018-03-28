package com.keepcool.keeptraining;

import java.util.ArrayList;

public class ListSerie {

    private ArrayList<Serie> list;

    public ListSerie() {
        list=new ArrayList<>();
        build();
    }

    public Serie get(int position) {
        return list.get(position);
    }

    public int size() {
        return list.size();
    }

    private void build() {
        list.add(new Serie(20, 15));
        list.add(new Serie(25, 12));
        list.add(new Serie(30, 10));
        list.add(new Serie(35, 8));
    }
}
