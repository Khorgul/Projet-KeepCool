package com.keepcool.keeptraining;

import android.content.Intent;
import android.support.design.widget.FloatingActionButton;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ListView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity implements PlaylistAdapter.PlaylistAdapterListener {

    public final static String PLAYLIST_POSITION = "com.keepcool.keeptraining.position-playlist";
    private FloatingActionButton FabPlaylist;
    private ListView lv;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.menu_playlist);
        FabPlaylist=findViewById(R.id.NewPlaylist);

        final ListPlaylist mListP = ListPlaylist.getInstance();

        final PlaylistAdapter adapter = new PlaylistAdapter(this, mListP);

        lv = findViewById(R.id.LvPlaylist);

        lv.setAdapter(adapter);

        adapter.addListener(this);

        FabPlaylist.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Toast.makeText(MainActivity.this, "Nouvelle Playlist", Toast.LENGTH_SHORT).show();
                mListP.add(new Playlist(1, "test", R.drawable.ic_launcher_background));
                adapter.notifyDataSetChanged();
            }
        });
    }

    @Override
    public void onClickNom(Playlist item, int position) {
        Intent intent = new Intent(this.getApplicationContext(), ExerciceActivity.class);
        intent.putExtra(PLAYLIST_POSITION,position);
        startActivity(intent);
    }
}
