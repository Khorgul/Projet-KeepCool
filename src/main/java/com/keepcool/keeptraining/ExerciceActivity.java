package com.keepcool.keeptraining;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.widget.ListView;

import static com.keepcool.keeptraining.MainActivity.PLAYLIST_POSITION;

/**
 * Created by ff600900@iutnice.unice.fr on 23/03/18.
 */

public class ExerciceActivity extends AppCompatActivity implements ExerciceAdapter.ExerciceAdapterListener{

    public static final String EXERCICE_POSITION = "com.keepcool.keeptraining.position-exercice";
    private int PlaylistPosition;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.menu_exercice);
        PlaylistPosition = getIntent().getIntExtra(PLAYLIST_POSITION, 0);

        ListExercice mListE = new ListExercice();

        ExerciceAdapter adapter = new ExerciceAdapter(this, mListE);

        ListView lv = findViewById(R.id.LvExercice);

        lv.setAdapter(adapter);

        adapter.addListener(this);
    }

    @Override
    public void onClickNom(Exercice item, int position) {
        Intent intent = new Intent(this.getApplicationContext(), SerieActivity.class);
        intent.putExtra(PLAYLIST_POSITION,PlaylistPosition);
        intent.putExtra(EXERCICE_POSITION,position);
        startActivity(intent);
    }
}
