import React, { useEffect, useState } from 'react';
import { View, StyleSheet, TouchableOpacity, Text, ImageBackground, StatusBar, Alert, ScrollView, Image } from 'react-native';
import dings from './../../assets/sound/bg.mp3';
import Icons from 'react-native-vector-icons/Feather';
import LinearGradient from 'react-native-linear-gradient';
import AsyncStorage from '@react-native-async-storage/async-storage';
import { CountdownCircleTimer } from 'react-native-countdown-circle-timer';
import { PacmanIndicator } from 'react-native-indicators';
import PLAYER_API from './../api/DataApi';
import IMAGE_API from './../api/ImageApi';

var Sound = require('react-native-sound');

const lose = require('./../../assets/icons/lose.png')



const Mulaikuis = ({ navigation,route }) => {
   

    const [loading, setLoading] = useState(true);
    const [datakuis, setdatakuis] = useState('');
    const [dataKirimKuis, setdataKirimKuis] = useState(route.params.item);
    const [notifsalah, setnotifsalah] = useState(false);
    const [notifbenar, setnotifbenar] = useState(false);

    
    useEffect(() => {

        ambilKuis()

      
    }, []);



    async function ambilKuis() {
        const ids = await AsyncStorage.getItem('siPlayer');
        fetch(`${PLAYER_API}/kuis/${ids}`)
            .then(response => response.json())
            .then(async function (data) {

                if (data.code === 200) {
                    setLoading(false)
                    setdatakuis(data.data.kuis)
                } else {
                    setLoading(false)
                    Alert.alert(`${data.code}`, `${data.data}`, [
                        { text: 'OK' },
                    ])
                }

            })
            .catch((error) => {
                setLoading(false)
                Alert.alert('404', `${error.message}`, [
                    {
                        text: 'Muat Ulang',
                    },
                ])
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

    async function pilihan(data){

        if (dataKirimKuis.jawaban == data) {
            kirimjawabanBenar(data);
            setnotifbenar(true)
            setInterval(() => {
                setnotifbenar(false)
            }, 3000);
        }else{
            kirimjawabanSalah(data);
            setnotifsalah(true)
            setInterval(() => {
                setnotifsalah(false)
            }, 3000);
        }
       
    }

    async function kirimjawabanBenar(item){
        const idPlayer = await AsyncStorage.getItem('siPlayer');
        const idKuis = dataKirimKuis.id;
        const formData = new FormData();
        formData.append('id_player', idPlayer);
        formData.append('id_kuis', idKuis);
        formData.append('skor', 10);
        fetch(`${PLAYER_API}/jawabanKuis`, {
            method: 'POST',
            headers: {
                'Content-Type': 'multipart/form-data',
            },
            body: formData,
          })
          .then(response => response.json())
          .then(async function (data){
              if (data.code === 200) {
                
                  navigation.replace("Pilihlevel");
              } else {
           
                  Alert.alert(`${data.code}`, `${data.data}`, [
                      { text: 'OK' },
                  ])
              }
          })
          .catch((error) => {
              Alert.alert('404', `${error.message}`, [
                  { text: 'Muat Ulang' },
              ])
          });


    }

    async function kirimjawabanSalah(item){
        setTimeout(() => {
            setnotifsalah(true)
            navigation.replace("Pilihlevel")
        }, 2000);
    }



    return (
        <ImageBackground resizeMode='cover' source={require('./../../assets/bg-1.png')} className="flex-1">
            {
                notifsalah ? (
                    <View className="absolute flex-1 w-full h-full bg items-center justify-center p-6 z-50" style={{ backgroundColor: 'rgba(0,0,0,0.5)' }}>
                        <View className="p-6 bg-red-500 w-full relative flex items-center rounded-xl">
                            <View className="absolute top-[-100px]">
                                <Image source={lose} className="w-[150px] h-[150px]" resizeMode='cover' />
                            </View>
                            <View className="mt-12">
                                <Text className="text-white text-center font-bold text-xl mb-2">Jawaban Anda Salah</Text>
                                <Text className="text-white text-center font-medium text-base">Silahkan Coba Kembli!</Text>
                            </View>
                        </View>
                    </View>
                ) : (
                    notifbenar ? (
                        <View className="absolute flex-1 w-full h-full bg items-center justify-center p-6 z-50" style={{ backgroundColor: 'rgba(0,0,0,0.5)' }}>
                        <View className="p-6 bg-green-600 w-full relative flex items-center rounded-xl">
                            <View className="absolute top-[-100px]">
                                <Image source={lose} className="w-[150px] h-[150px]" resizeMode='cover' />
                            </View>
                            <View className="mt-12">
                                <Text className="text-white text-center font-bold text-xl mb-2">Selamat !</Text>
                                <Text className="text-white text-center font-medium text-base">Jawaban untuk kuis ini adalah {dataKirimKuis.jawaban}</Text>
                            </View>
                        </View>
                    </View>
                    ) : null
                )
            }
            <View className="flex flex-row items-center justify-between pt-10 pb-3 pr-6  ">
                <View className="flex flex-row items-center">
                    <TouchableOpacity
                        onPress={() => navigation.navigate("Pilihlevel")}
                        className="flex items-center justify-center w-[57px] h-[57px]"
                    >
                        <Icons name="arrow-left" size={24} color={'white'} />
                    </TouchableOpacity>
                    <Text className="text-white font-bold text-xl mx-8">KUIS</Text>
                </View>
                <View className="flex flex-row items-center justify-center w-[57px] h-[57px]">
                    <Icons name="gift" size={20} color={'white'} />
                    <Text className="text-white font-bold text-xl ml-1">{dataKirimKuis.level}</Text>
                </View>
            </View>
            
           
            <ScrollView className="p-6">
                <ImageBackground
                    source={{ uri: `${IMAGE_API}/${dataKirimKuis.gambar}` }}
                    resizeMode='cover'
                    className="w-full h-[250px] rounded-lg"
                />
                <Text className="text-xl text-white text-center font-medium py-6">{dataKirimKuis.pertanyaan}</Text>
                <View className="gap-3 pb-20">
                    <TouchableOpacity
                        onPress={() => pilihan(dataKirimKuis.a)}
                        className="flex flex-row items-center justify-center border-slate-200 border-2 rounded-md bg-slate-300"
                    >
                        <Text className="text-base text-yellow-600 text-center font-medium py-6">A.</Text>
                        <Text className="text-base text-yellow-600 text-center font-medium py-6 ml-2">{dataKirimKuis.a}</Text>
                    </TouchableOpacity>
                    <TouchableOpacity
                        onPress={() => pilihan(dataKirimKuis.b)}
                        className="flex flex-row items-center justify-center border-slate-200 border-2 rounded-md bg-slate-300"
                    >
                        <Text className="text-base text-yellow-600 text-center font-medium py-6">B.</Text>
                        <Text className="text-base text-yellow-600 text-center font-medium py-6 ml-2">{dataKirimKuis.b}</Text>
                    </TouchableOpacity>
                    <TouchableOpacity
                        onPress={() => pilihan(dataKirimKuis.c)}
                        className="flex flex-row items-center justify-center border-slate-200 border-2 rounded-md bg-slate-300"
                    >
                        <Text className="text-base text-yellow-600 text-center font-medium py-6">C.</Text>
                        <Text className="text-base text-yellow-600 text-center font-medium py-6 ml-2">{dataKirimKuis.c}</Text>
                    </TouchableOpacity>
                    <TouchableOpacity
                        onPress={() => pilihan(dataKirimKuis.d)}
                        className="flex flex-row items-center justify-center border-slate-200 border-2 rounded-md bg-slate-300"
                    >
                        <Text className="text-base text-yellow-600 text-center font-medium py-6">D.</Text>
                        <Text className="text-base text-yellow-600 text-center font-medium py-6 ml-2">{dataKirimKuis.d}</Text>
                    </TouchableOpacity>
                </View>
            </ScrollView>
        </ImageBackground>

    );
};

export default Mulaikuis;
