package com.keepcool.keeptraining;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.ListAdapter;
import android.widget.RelativeLayout;
import android.widget.TextView;

import java.util.ArrayList;

public class SerieAdapter extends BaseAdapter{
    private ListSerie mListS;

    //Le contexte dans lequel est présent notre adapter
    private Context mContext;

    //Un mécanisme pour gérer l'affichage graphique depuis un layout XML
    private LayoutInflater mInflater;


    public SerieAdapter(Context context, ListSerie aListS) {
        mContext = context;
        mListS = aListS;
        mInflater = LayoutInflater.from(mContext);
    }

    public int getCount() {
        return mListS.size();
    }

    public Object getItem(int position) {
        return mListS.get(position);
    }

    public long getItemId(int position) {
        return position;
    }

    public View getView(int position, View convertView, ViewGroup parent) {
        RelativeLayout layoutItem;

        //(1) : Réutilisation des layouts
        if (convertView == null) {
            //Initialisation de notre item à partir du  layout XML ""
            layoutItem = (RelativeLayout) mInflater.inflate(R.layout.serie_layout, parent, false);
        } else {
            layoutItem = (RelativeLayout) convertView;
        }

        //(2) : Récupération des TextView de notre layout
        TextView tvNom = (TextView) layoutItem.findViewById(R.id.SerieNom);
        TextView tvCharge = (TextView) layoutItem.findViewById(R.id.SerieCharge);
        TextView tvNb = (TextView) layoutItem.findViewById(R.id.SerieNb);

        //(3) : Renseignement des valeurs
        tvNom.setText("Serie "+position);
        tvCharge.setText(String.valueOf(mListS.get(position).getCharge()));
        tvNb.setText(String.valueOf(mListS.get(position).getNb()));

        layoutItem.setTag(position);

        layoutItem.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                Integer position = (Integer)v.getTag();
                sendListener(mListS.get(position), position);

            }

        });
        //On retourne l'item créé.
        return layoutItem;
    }

    //abonnement pour click sur le nom...
    private ArrayList<SerieAdapter.SerieAdapterListener> mListListener = new ArrayList<SerieAdapter.SerieAdapterListener>();
    public void addListener(SerieAdapter.SerieAdapterListener aListener) {
        mListListener.add(aListener);
    }
    private void sendListener(Serie item, int position) {
        for(int i = mListListener.size()-1; i >= 0; i--) {
            mListListener.get(i).onClickNom(item, position);
        }
    }


    // Interface pour écouter les évènements sur le nom du diplome

    public interface SerieAdapterListener {
        public void onClickNom(Serie item, int position);
    }
}
