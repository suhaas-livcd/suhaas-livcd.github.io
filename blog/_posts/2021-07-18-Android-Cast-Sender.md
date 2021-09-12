---
layout: blog-post
title: "Android Cast Sender"
slug: Android-Cast-Sender
meta-title: Android Cast Sender
meta-description: Casting Audio application 
meta-image: /blog/images/blog_thumb_android_cast.svg
---

<img src="/blog/images/blog_thumb_android_cast.svg" align="center" title="MainScreen" width="100" height="100">

{% include toc.md %}

 [![KFN_GITHUB](https://img.shields.io/badge/<&nbsp;>&nbsp;Code-Github-black)](https://github.com/suhaas-livcd/AndroidCastSender)

Here *Android Cast **Sender*** may be a phone or tablet running on Android or iOS, or it may be a laptop computer running Chrome. A sender application running on the sender device uses the **Google Cast API** for the appropriate platform to discover and communicate with the receiver application running on the receiver device.

<img src="/blog/images/blog_androidcast_arch.svg" align="center" title="MainScreen">

### Implementing CAST Sender

The Google Cast SDK includes API libraries to connect to the receiver.

Steps :
1. Android cast API from sender device tries to connect to Chromecast or Google Home and sends app id
2. Chromecast or Google Home uses app id to get URL of HTML5 application
3. Then using that URL, HTML page or Audio is rendered/streamed on device

To develop please refer below steps, that will help to quickly get started.
### Develop Cast Sender using Android Cast API

##### Add the MediaRouteButton in xml or in the Menu Options
``` xml
<androidx.mediarouter.app.MediaRouteButton
        android:id="@+id/media_route_button"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:mediaRouteTypes="user"
        android:visibility="visible"
        app:layout_constraintStart_toStartOf="parent"
        app:layout_constraintTop_toTopOf="parent"/>
```

##### Bind the media_route_button with Casting functionality

``` java
mMediaRouteButton = (MediaRouteButton) findViewById(R.id.media_route_button);
CastButtonFactory.setUpMediaRouteButton(getApplicationContext(), mMediaRouteButton);
```

##### Enabled MediaRouteButton 

<img src="https://raw.githubusercontent.com/suhaas-livcd/AndroidCastSender/master/samples/CastDevicesAvailable.jpg" align="center" title="Casting Enabled" width="300" >

##### OnClick Route Button Device Dialogue

<img src="https://raw.githubusercontent.com/suhaas-livcd/AndroidCastSender/master/samples/CastDeviceChoosingDailogue.png" align="center" title="Available Cast devices in network" width="300" >


### Setting up Meta-Data, Media-Info, RemoteMediaClient
##### Add the metadata which shows on the casting dialogue

``` java
MediaMetadata metadata = new MediaMetadata(MediaMetadata.MEDIA_TYPE_GENERIC);
    metadata.putString(MediaMetadata.KEY_TITLE, "Sample Music");
    metadata.putString(MediaMetadata.KEY_SUBTITLE, "Sound Helix");
    metadata.addImage(new WebImage(Uri.parse("https://homepages.cae.wisc.edu/~ece533/images/airplane.png")));
    movieMetadata.addImage(new WebImage(Uri.parse("https://github.com/mkaflowski/HybridMediaPlayer/blob/master/images/cover.jpg?raw=true")));
```

##### Add the MediaInfo using the MediaInfo builder
``` java
MediaInfo mediaInfo = new MediaInfo.Builder("https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3")
    .setContentType("audio/mp3")
    .setStreamType(MediaInfo.STREAM_TYPE_BUFFERED)
    .setMetadata(metadata)
    .build();
```

##### Create a media load request object
``` java
MediaLoadRequestData mediaLoadRequestData = new MediaLoadRequestData.Builder().setMediaInfo(mediaInfo).build();
```

##### Load it using RemoteMediaClient

``` java
RemoteMediaClient remoteMediaClient = mCastContext.getSessionManager().getCurrentCastSession().getRemoteMediaClient();
```

##### Using a RemoteMediaClient is similar to a MediaPlayerObject

``` java
if (remoteMediaClient.isPlaying()) {
    // Change Image button to play
    mPlayPauseButton.setImageResource(R.drawable.ic_play_arrow_black_24dp);
    // Pause if playing
    remoteMediaClient.pause();
} else {
    // Change Image button to pause
    mPlayPauseButton.setImageResource(R.drawable.ic_pause_black_24dp);
    if (remoteMediaClient.isPaused()) {
        // Play if previous pause
        remoteMediaClient.play();
    } else {
        // If first time playing
        remoteMediaClient.load(mediaLoadRequestData);
    }
}
```

##### Check for DEVICE_CONNECTED status
``` java
if (mCastContext.getCastState() == CastState.CONNECTED) {
    // Load MediaInfo
} else{
    Toast.makeText(getApplicationContext(),"CAST NOT CONNECTED",Toast.LENGTH_SHORT).show();
}
```

##### Shows Cast Playing

<img src="https://raw.githubusercontent.com/suhaas-livcd/AndroidCastSender/master/samples/AndroidCastSender_Cast_dialogue.png" align="center" title="Available Cast devices in network" width="300" >

#### Pending things that you can try
- Show cast options in Notification
- Adding Queues as playlist
- More Cast controls and Mediaroutes

### Reference
- [Setup for Developing with the Cast Application Framework (CAF) for Android](https://developers.google.com/cast/docs/android_sender)
- [Google Sender App](https://developers.google.com/cast/docs/design_checklist/sender)
- [Integrate Cast Into Your Android App](https://developers.google.com/cast/docs/android_sender/integrate)
- [Sending media to Chromecast has never been easier (Exoplayer cast extension)](https://medium.com/android-news/sending-media-to-chromecast-has-never-been-easier-c331eeef1e0a)
- [Google Play Services: Google Cast v3 and Media](https://code.tutsplus.com/tutorials/google-play-services-google-cast-v3-and-media--cms-26893)
- [Everything You NEED To Know About Chrome Cast and Its Development](https://www.azilen.com/blog/everything-need-know-chrome-cast-development/)