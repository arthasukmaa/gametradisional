import React, { useState, useEffect } from 'react';
import {
    View,
    Text,
    FlatList,
    Image,
    TouchableOpacity,
    StatusBar,
    ImageBackground,
    TextInput,
    Alert,
} from 'react-native';
import Icon from 'react-native-vector-icons/Feather';
import LinearGradient from 'react-native-linear-gradient';
import { PacmanIndicator } from 'react-native-indicators';
import AsyncStorage from '@react-native-async-storage/async-storage';
import PLAYER_API from './../api/DataApi';
import IMAGE_API from './../api/ImageApi';

const Home = ({navigation}) => {

    const [loading, setLoading] = useState(true);
    const [dataProf, setdataprof] = useState('');

    useEffect(() => {
        ambilData()
    }, [])


    function ambilData() {
        fetch(`${PLAYER_API}/dashboard`)
            .then(response => response.json())
            .then(async function (data) {
                setLoading(true)
                if (data.code === 200) {
                    setLoading(false)
                    setdataprof(data.data)
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
        return(
            <View className="absolute flex-1 w-full h-full items-center justify-center bg-purple-700">
                <StatusBar
                    barStyle={'dark-content'}
                    backgroundColor="transparent"
                    translucent
                />
                <PacmanIndicator color="#FFFFFF" size={100} count={9} />
            </View>
        )
    }


    function listHeader(){
        return(
            <View className="flex flex-row items-center pt-12 bg-purple-700">
                <TouchableOpacity
                    onPress={() => navigation.navigate("Listmenu")}
                    className="flex items-center justify-center w-[57px] h-[57px]"
                >
                    <Icon name="arrow-left" size={24} color="white" />
                </TouchableOpacity>
                <Text className="text-white font-medium text-xl uppercase">Permainan Tradisional</Text>
            </View>
        )
    }



    function renderItem({item}){
        return(
            <TouchableOpacity
                onPress={() => navigation.navigate('Detaildaerah', { item })}
                className="relative rounded-md"
            >
                <ImageBackground
                    source={{ uri: `${IMAGE_API}/${item.galeri[0].gambar}` }}
                    resizeMode='cover'
                    className="mx-3 my-3 p-4 w-[165px] h-[110px] rounded-md items-center justify-center "
                >
                    <Text className="text-center font-medium text-white absolute z-20">
                        {item.asal_daerah}
                    </Text>
                    <View className="w-[165px] h-[110px] absolute top-0 left-0 z-10 rounded-md" style={{ backgroundColor: 'rgba(0,0,0,0.3)' }} />
                </ImageBackground>
            </TouchableOpacity>
        )
    }


    return (
        <View>
           
            <FlatList
                keyExtractor={(item, index) => item.id}
                data={dataProf}
                renderItem={renderItem}
                numColumns={2}
                ListHeaderComponent={listHeader}
                stickyHeaderIndices={[0]}
            />
        </View>
    )
}

export default Home