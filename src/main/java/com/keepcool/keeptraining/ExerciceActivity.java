package com.keepcool.keeptraining;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.widget.ListView;

/**
 * Created by ff600900@iutnice.unice.fr on 23/03/18.
 */

public class ExerciceActivity extends AppCompatActivity implements ExerciceAdapter.ExerciceAdapterListener{

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.menu_exercice);

        ListExercice mListE = new ListExercice();
        mListE.build();

        ExerciceAdapter adapter = new ExerciceAdapter(this, mListE);

        ListView lv = findViewById(R.id.LvExercice);

        lv.setAdapter(adapter);

        adapter.addListener(this);
    }

    @Override
    public void onClickNom(Exercice item, int position) {

    }
}
