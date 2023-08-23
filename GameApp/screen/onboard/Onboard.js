import {
    View,
    Text,
    ImageBackground,
    Image,
    TouchableOpacity,
    StatusBar,
} from 'react-native';
import React, { useEffect, useState } from 'react';
import AsyncStorage from '@react-native-async-storage/async-storage';
import Icon from "react-native-vector-icons/Feather";
import { PacmanIndicator } from 'react-native-indicators';
import PLAYER_API from './../api/DataApi';

const Onboard = ({ navigation }) => {
    const [loading, setLoading] = useState(true);
    const [notif, setNotif] = useState(false);

    useEffect(() => {

        cekLogin()
    }, []);

    async function cekLogin() {
        const cek = await AsyncStorage.getItem('siPlayer');

        fetch(`${PLAYER_API}/cekLogin/${cek}`)
            .then(response => response.json())
            .then(data => {
                setLoading(false)
                if (data.code == 200) {
                    navigation.replace("Listmenu")
                }
            })
            .catch(error => {
                setLoading(false)
                setNotif(true)
                console.log(error.message);
            });
    }

    if (loading) {
        return (
            <View className="flex-1 bg-white items-center justify-center">
                <StatusBar
                    barStyle={'dark-content'}
                    backgroundColor="transparent"
                    translucent
                />
                <PacmanIndicator color="#4f46e5" size={100} count={9} />
            </View>
        );
    }


    return (
        <ImageBackground
            source={require('./../../assets/bg.png')}
            className="bg-indigo-600 w-screen h-full">
            <StatusBar
                barStyle={'light-content'}
                backgroundColor={'transparent'}
                translucent
            />
            {
                notif ? (
                    <View className="absolute w-full h-full flex items-center justify-center p-6 z-50" style={{ backgroundColor: 'rgba(0,0,0,0.4)' }}>
                        <View className="flex items-center justify-center p-6 bg-slate-800 rounded-lg">
                            <Icon name="alert-circle" size={40} color="red" />
                            <Text className="text-2xl font-bold mt-3">Koneksi Terputus !</Text>
                            <Text className="text-xl">Periksa koneksi jaringan anda !</Text>
                        </View>
                    </View>
                ) : null
            }
            <View className="flex items-center justify-center mt-[100px]">
                <Text className="text-4xl font-bold">Permainan</Text>
                <Text className="text-2xl font-bold px-6 text-center">Tradisional Khas Daerah Indonesia</Text>
            </View>
            <View className="flex items-center justify-center mt-11 mb-14">
                <Image
                    source={require('./../../assets/Indonesia.png')}
                    className="w-full h-[150px]"
                    resizeMode="contain"
                />
            </View>
            <View className="p-6">
                <View className="w-full rounded-[20px] bg-white p-6">
                    <View className="flex items-center mb-6">
                        <Text className="font-bold text-2xl text-indigo-600 mb-3 text-center">
                            Masuk atau Buat Akun
                        </Text>
                        <Text className="font-medium text-base text-slate-400 text-center">
                            Masuk atau buat akun untuk mengikuti kuis, ambil bagian dalam
                            tantangan, dan lainnya.
                        </Text>
                    </View>
                    <View className="flex items-center">
                        <TouchableOpacity
                            onPress={() => navigation.navigate('Login')}
                            className="items-center justify-center px-6 py-4 bg-indigo-600 w-full rounded-full mb-3">
                            <Text className="text-base font-medium text-white">Masuk</Text>
                        </TouchableOpacity>
                        <TouchableOpacity
                            onPress={() => navigation.navigate('Register')}
                            className="items-center justify-center px-6 py-4 bg-slate-300 w-full rounded-full">
                            <Text className="text-base font-medium text-indigo-600">
                                Buat Akun
                            </Text>
                        </TouchableOpacity>
                    </View>
                </View>
            </View>
        </ImageBackground>
    );
};

export default Onboard;
