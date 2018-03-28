package com.keepcool.keeptraining;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.widget.ListView;

import static com.keepcool.keeptraining.ExerciceActivity.EXERCICE_POSITION;
import static com.keepcool.keeptraining.MainActivity.PLAYLIST_POSITION;

/**
 * Created by ff600900@iutnice.unice.fr on 23/03/18.
 */

public class SerieActivity extends AppCompatActivity implements SerieAdapter.SerieAdapterListener{

    private int PlaylistPosition;
    private int ExercicePosition;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.menu_serie);
        PlaylistPosition=getIntent().getIntExtra(PLAYLIST_POSITION, 1);
        ExercicePosition=getIntent().getIntExtra(EXERCICE_POSITION, 1);

        ListSerie mListS = new ListSerie();

        SerieAdapter adapter = new SerieAdapter(this, mListS);

        ListView lv = findViewById(R.id.LvSerie);

        lv.setAdapter(adapter);

        adapter.addListener(this);
    }

    @Override
    public void onClickNom(Serie item, int position) {

    }
}
