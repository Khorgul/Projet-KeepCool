package com.keepcool.keeptraining;

import java.util.ArrayList;

/**
 * Created by florian on 16/03/18.
 */

public class ListPlaylist {

    private ArrayList<Playlist> list;

    private ListPlaylist() {
        list=new ArrayList<>();
    }

    public Playlist get(int position) {
        return list.get(position);
    }

    public int size() {
        return list.size();
    }

    public void build() {
        list.add(new Playlist(1, "test", R.drawable.ic_launcher_background));
        list.add(new Playlist(1, "test", R.drawable.ic_launcher_background));
        list.add(new Playlist(1, "test", R.drawable.ic_launcher_background));
    }

    /** Holder */
    private static class SingletonHolder
    {
        /** Instance unique non préinitialisée */
        private final static ListPlaylist instance = new ListPlaylist();
    }

    /** Point d'accès pour l'instance unique du singleton */
    public static ListPlaylist getInstance()
    {
        return SingletonHolder.instance;
    }
}
