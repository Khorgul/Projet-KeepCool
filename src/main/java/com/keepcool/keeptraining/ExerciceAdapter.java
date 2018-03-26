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
 * Created by ff600900@iutnice.unice.fr on 23/03/18.
 */

public class ExerciceAdapter extends BaseAdapter {

    private ListExercice mListE;

    //Le contexte dans lequel est présent notre adapter
    private Context mContext;

    //Un mécanisme pour gérer l'affichage graphique depuis un layout XML
    private LayoutInflater mInflater;


    public ExerciceAdapter(Context context, ListExercice aListE) {
        mContext = context;
        mListE = aListE;
        mInflater = LayoutInflater.from(mContext);
    }

    public int getCount() {
        return mListE.size();
    }

    public Object getItem(int position) {
        return mListE.get(position);
    }

    public long getItemId(int position) {
        return position;
    }

    public View getView(int position, View convertView, ViewGroup parent) {
        RelativeLayout layoutItem;

        //(1) : Réutilisation des layouts
        if (convertView == null) {
            //Initialisation de notre item à partir du  layout XML ""
            layoutItem = (RelativeLayout) mInflater.inflate(R.layout.exercice_layout, parent, false);
        } else {
            layoutItem = (RelativeLayout) convertView;
        }

        //(2) : Récupération des TextView de notre layout
        TextView tvNom = (TextView) layoutItem.findViewById(R.id.NomPlaylist);
        ImageView image = (ImageView) layoutItem.findViewById(R.id.imgPlaylist);

        //(3) : Renseignement des valeurs
        tvNom.setText(mListE.get(position).getNom());

        layoutItem.setTag(position);

        layoutItem.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                Integer position = (Integer)v.getTag();
                sendListener(mListE.get(position), position);

            }

        });
        //On retourne l'item créé.
        return layoutItem;
    }

    //abonnement pour click sur le nom...
    private ArrayList<ExerciceAdapter.ExerciceAdapterListener> mListListener = new ArrayList<ExerciceAdapter.ExerciceAdapterListener>();
    public void addListener(ExerciceAdapter.ExerciceAdapterListener aListener) {
        mListListener.add(aListener);
    }
    private void sendListener(Exercice item, int position) {
        for(int i = mListListener.size()-1; i >= 0; i--) {
            mListListener.get(i).onClickNom(item, position);
        }
    }


    // Interface pour écouter les évènements sur le nom du diplome

    public interface ExerciceAdapterListener {
        public void onClickNom(Exercice item, int position);
    }


}
