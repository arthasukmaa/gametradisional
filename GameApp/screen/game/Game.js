import React from 'react';
import { View, Text, StatusBar} from 'react-native';
import { WebView } from 'react-native-webview';
import PLAYER_API from './../api/DataApi';

const Game = () => {
    return (
        <>
            <StatusBar barStyle={'dark-content'} backgroundColor={'transparent'} translucent />
            <WebView source={{ uri: 'http://192.168.196.52/gametradisional/GameApp/tembakbuluh/game.html' }} style={{ flex: 1 }} />
        </>
    )
}

export default Game