import React, { useEffect, useState } from 'react';
import { View, FlatList, TouchableOpacity, Text, ImageBackground, StatusBar, Alert } from 'react-native';

import Icons from 'react-native-vector-icons/Feather';
import { PacmanIndicator } from 'react-native-indicators';
import PLAYER_API from './../api/DataApi';
import AsyncStorage from '@react-native-async-storage/async-storage';


const Pilihlevel = ({ navigation }) => {

    const [dataLevel, setdataLevel] = useState('');
    const [dataNilai, setdataNilai] = useState([]);
    const [loading, setLoading] = useState(true);
    const [jumlahJawaban, setjumlahJawaban] = useState(0);
    const [jumlahSkor, setjumlahSkor] = useState(0);

    useEffect(() => {
        ambilData()
    }, [])


    async function ambilData() {
        const ids = await AsyncStorage.getItem('siPlayer');

        fetch(`${PLAYER_API}/kuis/${ids}`)
            .then(response => response.json())
            .then(function (data) {
                setLoading(true)
                if (data.code === 200) {
                    setLoading(false)
                    setdataLevel(data.data.kuis)
                    setdataNilai(data.data.nilai)
                    setjumlahJawaban(data.data.jumlahJawaban)
                    setjumlahSkor(data.data.jumlahSkor)
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


    const resetJawaban = async () => {
        const ids = await AsyncStorage.getItem('siPlayer');
        fetch(`${PLAYER_API}/resetJawaban/${ids}`)
            .then(response => response.json())
            .then(function (data) {
                setLoading(true)
                if (data.code === 200) {
                    setLoading(false)
                    Alert.alert(`${data.message}`, `${data.message}`, [
                        {
                            text: 'OK',
                            onPress: () => navigation.replace('Pilihlevel'),
                        },
                    ])
                } else {
                    setLoading(false)
                    Alert.alert(`${data.message}`, `${data.message}`, [
                        {
                            text: 'MULAI ULANG',
                            onPress: () => navigation.replace('Pilihlevel'),
                        },
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

    function renderItem({ item }) {

        const isKuisDimainkan = dataNilai.some((data) => data.id_kuis === item.id);



        function cekClick(item) {

            if (jumlahSkor === 0 && item.level === 1) {
                navigation.navigate("Mulaikuis", {item})
            }
            if (jumlahSkor === 0 && item.level === 2) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 0 && item.level === 3) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 0 && item.level === 4) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 0 && item.level === 5) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 0 && item.level === 6) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 0 && item.level === 7) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 0 && item.level === 8) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 0 && item.level === 9) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 0 && item.level === 10) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }

            if (jumlahSkor === 10 && item.level === 2) {
                navigation.navigate("Mulaikuis", {item})
            }
            if (jumlahSkor === 10 && item.level === 3) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 10 && item.level === 4) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 10 && item.level === 5) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 10 && item.level === 6) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 10 && item.level === 7) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 10 && item.level === 8) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 10 && item.level === 9) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 10 && item.level === 10) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }

            if (jumlahSkor === 20 && item.level === 3) {
                navigation.navigate("Mulaikuis", {item})
            }
            if (jumlahSkor === 20 && item.level === 4) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 20 && item.level === 5) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 20 && item.level === 6) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 20 && item.level === 7) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 20 && item.level === 8) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 20 && item.level === 9) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 20 && item.level === 10) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }

            if (jumlahSkor === 30 && item.level === 4) {
                navigation.navigate("Mulaikuis", {item})
            }
            if (jumlahSkor === 30 && item.level === 5) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 30 && item.level === 6) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 30 && item.level === 7) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 30 && item.level === 8) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 30 && item.level === 9) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 30 && item.level === 10) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }

            if (jumlahSkor === 40 && item.level === 5) {
                navigation.navigate("Mulaikuis", {item})
            }
            if (jumlahSkor === 40 && item.level === 6) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 40 && item.level === 7) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 40 && item.level === 8) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 40 && item.level === 9) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 40 && item.level === 10) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }

            if (jumlahSkor === 50 && item.level === 6) {
                navigation.navigate("Mulaikuis", {item})
            }
            if (jumlahSkor === 50 && item.level === 7) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 50 && item.level === 8) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 50 && item.level === 9) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 50 && item.level === 10) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }

            if (jumlahSkor === 60 && item.level === 7) {
                navigation.navigate("Mulaikuis", {item})
            }
            if (jumlahSkor === 60 && item.level === 8) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 60 && item.level === 9) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 60 && item.level === 10) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }

            if (jumlahSkor === 70 && item.level === 8) {
                navigation.navigate("Mulaikuis", {item})
            }
            if (jumlahSkor === 70 && item.level === 9) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }
            if (jumlahSkor === 70 && item.level === 10) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }

            if (jumlahSkor === 80 && item.level === 9) {
                navigation.navigate("Mulaikuis", {item})
            }
            if (jumlahSkor === 80 && item.level === 10) {
                Alert.alert("Level belum tersedia", "Silakan selesaikan level sebelumnya terlebih dahulu.");
            }

            if (jumlahSkor === 90 && item.level === 10) {
                navigation.navigate("Mulaikuis", {item})
            }

        }


        return (
            <>
                {
                    isKuisDimainkan ? (
                        <View
                            style={{
                                backgroundColor: 'rgba(0,0,0,.3)'
                            }}
                            className="bg-white p-6 mx-6 mb-6 rounded-md flex flex-row items-center justify-between"
                        >
                            <View className="w-[200px]">
                                <Text className="text-4xl font-bold">{item.level}</Text>
                                <Text>{item.pertanyaan}</Text>
                            </View>
                            <View className={`bg-green-500 p-4 rounded-full`}>
                                <Icons name="unlock" size={24} color="white" />
                            </View>
                        </View>
                    ) : (
                        <TouchableOpacity
                            onPress={() => cekClick(item)}
                            style={{
                                backgroundColor: 'rgba(0,0,0,.3)'
                            }}
                            className="bg-white p-6 mx-6 mb-6 rounded-md flex flex-row items-center justify-between"
                        >
                            <View className="w-[200px]">
                                <Text className="text-4xl font-bold">{item.level}</Text>
                                <Text>{item.pertanyaan}</Text>
                            </View>
                            <View className={`bg-orange-500 p-4 rounded-full`}>
                                <Icons name="lock" size={24} color="white" />
                            </View>
                        </TouchableOpacity>
                    )
                }
            </>

        );
    }

    return (
        <ImageBackground resizeMode='cover' source={require('./../../assets/bg-1.png')} className="flex-1">
            <StatusBar
                barStyle={'light-content'}
                backgroundColor="transparent"
                translucent
            />
            <View className="pt-12 flex flex-row items-center justify-between px-6 mb-6">
                <View className="flex flex-row items-center">
                    <TouchableOpacity
                        onPress={() => navigation.navigate("Kuis")}
                        className="flex items-center justify-center bg-orange-500 w-[57px] h-[57px] border-2 border-slate-200 rounded-md mr-8"
                    >
                        <Icons name="chevron-left" size={24} color="white" />
                    </TouchableOpacity>
                    <Text className="uppercase font-PoppinsBlack font-extrabold text-3xl text-white">KUIS</Text>
                </View>
                <TouchableOpacity
                    onPress={resetJawaban}
                    className="flex items-center justify-center bg-orange-500 w-[57px] h-[57px] border-2 border-slate-200 rounded-md"
                >
                    <Icons name="refresh-cw" size={24} color="white" />
                </TouchableOpacity>
            </View>
            <View className="px-6 py-4 flex flex-row items-center justify-between mb-6">
                <Text className="text-xl text-white font-bold uppercase">SKOR</Text>
                <Text className="text-xl text-white font-bold uppercase"> {jumlahSkor} / {jumlahJawaban}</Text>
            </View>
            <FlatList
                data={dataLevel}
                renderItem={renderItem}
                className="gap-3"
            />
        </ImageBackground>
    )
}

export default Pilihlevel