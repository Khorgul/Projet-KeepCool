package com.keepcool.keeptraining;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ListView;

public class MainActivity extends AppCompatActivity implements PlaylistAdapter.PlaylistAdapterListener {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.menu_playlist);

        ListPlaylist mListP = ListPlaylist.getInstance();
        mListP.build();

        PlaylistAdapter adapter = new PlaylistAdapter(this, mListP);

        ListView lv = findViewById(R.id.LvPlaylist);

        lv.setAdapter(adapter);

        adapter.addListener(this);

    }

    @Override
    public void onClickNom(Playlist item, int position) {
        
    }
}
