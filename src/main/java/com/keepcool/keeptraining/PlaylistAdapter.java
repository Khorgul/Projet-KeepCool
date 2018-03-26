package com.keepcool.keeptraining;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import java.util.ArrayList;

/**
 * Created by florian on 16/03/18.
 */

public class PlaylistAdapter extends BaseAdapter {

    private ListPlaylist mListP;

    //Le contexte dans lequel est présent notre adapter
    private Context mContext;

    //Un mécanisme pour gérer l'affichage graphique depuis un layout XML
    private LayoutInflater mInflater;


    public PlaylistAdapter(Context context, ListPlaylist aListP) {
        mContext = context;
        mListP = aListP;
        mInflater = LayoutInflater.from(mContext);
    }

    public int getCount() {
        return mListP.size();
    }

    public Object getItem(int position) {
        return mListP.get(position);
    }

    public long getItemId(int position) {
        return position;
    }

    public View getView(int position, View convertView, ViewGroup parent) {
        RelativeLayout layoutItem;

        //(1) : Réutilisation des layouts
        if (convertView == null) {
            //Initialisation de notre item à partir du  layout XML ""
            layoutItem = (RelativeLayout) mInflater.inflate(R.layout.playlist_layout, parent, false);
        } else {
            layoutItem = (RelativeLayout) convertView;
        }

        //(2) : Récupération des TextView de notre layout
        TextView tvNom = (TextView) layoutItem.findViewById(R.id.NomPlaylist);
        ImageView image = (ImageView) layoutItem.findViewById(R.id.imgPlaylist);

        //(3) : Renseignement des valeurs
        tvNom.setText(mListP.get(position).getNom());
        image.setImageResource(mListP.get(position).getImg());

        layoutItem.setTag(position);

        layoutItem.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                Integer position = (Integer)v.getTag();
                sendListener(mListP.get(position), position);

            }

        });
        //On retourne l'item créé.
        return layoutItem;
    }

    //abonnement pour click sur le nom...
    private ArrayList<PlaylistAdapterListener> mListListener = new ArrayList<PlaylistAdapterListener>();
    public void addListener(PlaylistAdapterListener aListener) {
        mListListener.add(aListener);
    }
    private void sendListener(Playlist item, int position) {
        for(int i = mListListener.size()-1; i >= 0; i--) {
            mListListener.get(i).onClickNom(item, position);
        }
    }


    // Interface pour écouter les évènements sur le nom du diplome

    public interface PlaylistAdapterListener {
        public void onClickNom(Playlist item, int position);
    }


}
