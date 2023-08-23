import React, { useEffect, useState } from 'react';
import { View, TouchableOpacity, Text, ImageBackground, StatusBar, Alert, Modal } from 'react-native';
import { PacmanIndicator } from 'react-native-indicators';
import PLAYER_API from './../api/DataApi';
import Sound from 'react-native-sound';


const Kuis = ({ navigation }) => {

    const [modalVisible, setModalVisible] = useState(false);

    return (
        <ImageBackground resizeMode='cover' source={require('./../../assets/bg-1.png')} className="flex-1 p-8">
            <View className="h-1/2 items-center justify-center">
                <Text className="text-bold text-white text-[60px]">GAME</Text>
                <Text className="text-bold text-white text-[20px] text-center">Mari mulai game untuk mengenal permainan traditional khas daerah indonesia</Text>
            </View>
            <View className="h-1/2 items-center justify-center p-8">
                <TouchableOpacity
                    onPress={() => setModalVisible(true)}

                    className="flex items-center justify-center bg-orange-500 px-6 py-5 w-full border-2 border-slate-50 rounded-md"
                >

                    <Text className="text-bold text-white text-xl text-center">Mulai</Text>
                </TouchableOpacity>
            </View>



            <Modal
                animationType="slide"
                transparent={true}
                visible={modalVisible}
            >
                <View className="flex-1 items-center justify-center p-8 gap-6" style={{ backgroundColor: 'rgba(0,0,0,0.6)' }}>
                    <View>
                        <Text className="text-5xl font-medium text-white mb-6">LEVEL GAME</Text>
                    </View>
                    <TouchableOpacity
                        onPress={() => navigation.navigate("Game")}
                        className="flex items-center justify-center bg-orange-500 px-6 py-5 w-full border-2 border-slate-50 rounded-md"
                    >
                        <Text className="text-bold text-white text-xl text-center">MUDAH</Text>
                    </TouchableOpacity>
                    <TouchableOpacity
                        onPress={() => navigation.navigate("Pilihlevel")}
                        className="flex items-center justify-center bg-orange-500 px-6 py-5 w-full border-2 border-slate-50 rounded-md"
                    >
                        <Text className="text-bold text-white text-xl text-center">SEDANG</Text>
                    </TouchableOpacity>
                    <TouchableOpacity
                        onPress={() => navigation.navigate("Puzzle")}
                        className="flex items-center justify-center bg-orange-500 px-6 py-5 w-full border-2 border-slate-50 rounded-md"
                    >
                        <Text className="text-bold text-white text-xl text-center">SULIT</Text>
                    </TouchableOpacity>
                    <TouchableOpacity
                        onPress={() => setModalVisible(false)}
                        className="flex items-center justify-center bg-orange-500 px-6 py-5 w-full border-2 border-slate-50 rounded-md"
                    >
                        <Text className="text-bold text-white text-xl text-center">KEMBALI</Text>
                    </TouchableOpacity>
                </View>
            </Modal>
        </ImageBackground>

    );
};

export default Kuis;
