import React, { useState, useEffect } from 'react';
import {
  View,
  Text,
  FlatList,
  Image,
  TouchableOpacity,
  ScrollView,
  StatusBar,
  ImageBackground,
  TextInput,
  Alert,
} from 'react-native';
import Icon from 'react-native-vector-icons/Feather';
import { PacmanIndicator } from 'react-native-indicators';
import MapView, { Marker } from 'react-native-maps';
import { profinsi } from "./../dumy/dumyData";
import PLAYER_API from './../api/DataApi';
import IMAGE_API from './../api/ImageApi';

const Detaildaerah = ({ navigation, route }) => {

  const daerah = route.params.item.asal_daerah;
  const [loading, setLoading] = useState(true);
  const [datapermainan, setdatapermainan] = useState('');
  const [filteredData, setFilteredData] = useState('');

  useEffect(() => {

    cariLokasi();

    function ambilData() {
      fetch(`${PLAYER_API}/daerahPermainan/${daerah}`)
        .then(response => response.json())
        .then(async function (data) {

          if (data.code === 200) {
            setLoading(false)
            setdatapermainan(data.data)
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
    ambilData()
  }, [])


  function cariLokasi() {
    const filteredResult = profinsi.filter((item) =>
      item.name.toUpperCase().includes(daerah.toUpperCase())
    );
    setFilteredData(filteredResult);
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
    return (
      <TouchableOpacity
        onPress={() => navigation.navigate('Detailpermainan', { item })}
        className="relative rounded-md w-full"
      >
        <ImageBackground
          source={{ uri: `${IMAGE_API}/${item.galeri[0].gambar}` }}
          resizeMode='cover'
          className="mx-3 my-3 p-4 w-full h-[150px] rounded-md items-center justify-center "
        >
          <Text className="font-medium rounded-md text-2xl p-6 text-center text-white absolute z-20">
            {item.nama}
          </Text>
          <View className="w-full h-[150px] absolute top-0 left-0 z-10 rounded-md" style={{ backgroundColor: 'rgba(0,0,0,0.3)' }} />
        </ImageBackground>


      </TouchableOpacity>
    );
  }

  const lat = filteredData[0].latitude;
  const lng = filteredData[0].longitude;

  function listHeader() {
    return (
      <View className="p-6">
      {/* <MapView
        initialRegion={{
          latitude: lat,
          longitude: lng,
          latitudeDelta: 0.9,
          longitudeDelta: 0.9,
        }}
        className="w-full h-[400px]"
      >
        <Marker
          coordinate={{latitude: lat, longitude: lng}}
        />
      </MapView> */}
    </View>
    )
  }


 
  return (
    <View className="flex-1 bg-purple-600">
      <View className="flex flex-row items-center pt-12 px-6 pb-3 mb-3 bg-purple-700">
        <TouchableOpacity onPress={() => navigation.goBack()}>
          <Icon name="arrow-left" size={24} color={'white'} />
        </TouchableOpacity>
        <Text className="text-white font-bold text-2xl ml-8">{daerah}</Text>
      </View>
      <FlatList
        keyExtractor={(item, index) => item.id}
        data={datapermainan}
        renderItem={renderItem}
        numColumns={1}
        ListHeaderComponent={listHeader}
      />
      

    </View>

  );
};

export default Detaildaerah;
