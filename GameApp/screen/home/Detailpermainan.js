import React, { useState, useEffect, useRef } from 'react';
import {
    View,
    Text,
    Image,
    TouchableOpacity,
    ScrollView,
    StatusBar,
    Dimensions
} from 'react-native';
import Icon from 'react-native-vector-icons/Feather';
import Icons from 'react-native-vector-icons/FontAwesome';
import HTML from 'react-native-render-html';
import Video from 'react-native-video';


import IMAGE_API from './../api/ImageApi';

const Detailpermainan = ({ navigation, route }) => {

    const [data, setdata] = useState(route.params.item);
    const [datagaleri, setdatagaleri] = useState(route.params.item.galeri);
    const [vi, setvi] = useState(data.vidio != null || data.vidio != undefined ? data.vidio : 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4');
    const windowWidth = Dimensions.get('window').width;

    {console.log(vi)}
    const htmlContent = `${data.deskripsi}`;

    const cleanText = (html) => {
        const clean = html.replace(/<[^>]+>/g, '');
        return clean;
    };

    const tagsStyles = {
        p: { color: 'red' }, // Mengatur warna pada tag <p>
        strong: { color: 'blue' }, // Mengatur warna pada tag <strong>
    };

    const videoRef = useRef(null);
    const [isPlaying, setIsPlaying] = useState(false);

    const togglePlay = () => {
        if (isPlaying) {
            setIsPlaying(false);
        } else {
            setIsPlaying(true);
        }
      
    };
    return (
        <ScrollView>
            <StatusBar
                barStyle={'light-content'}
                backgroundColor={'transparent'}
                translucent
            />
            <View className="flex flex-row items-center pt-12 px-6 pb-3 bg-purple-700">
                <TouchableOpacity onPress={() => navigation.goBack()}>
                    <Icon name="arrow-left" size={24} color={'white'} />
                </TouchableOpacity>
                <Text className="text-white font-bold text-2xl ml-8">DETAIL PERMAINAN</Text>
            </View>
            <ScrollView horizontal={true}>
                {
                    datagaleri.map(function (item) {
                        return (
                            <Image id={item} source={{ uri: `${IMAGE_API}/${item.gambar}` }} resizeMode='cover' className="w-screen h-[250px]" />
                        )
                    })
                }
            </ScrollView>
            <View className="p-6 bg-purple-600">
                <View className="pb-3">
                    <View className="flex flex-row items-center mb-2">
                        <Icon name="list" size={18} color={'white'} />
                        <Text className="ml-6 text-base font-bold text-white">Permainan</Text>
                    </View>
                    <Text className="ml-11 text-base font-medium text-slate-50">{data.nama}</Text>
                </View>
                <View className="pb-3">
                    <View className="flex flex-row items-center mb-2">
                        <Icon name="list" size={18} color={'white'} />
                        <Text className="ml-6 text-base font-bold text-white">Daerah</Text>
                    </View>
                    <Text className="ml-11 text-base font-medium text-slate-50">{data.asal_daerah}</Text>
                </View>
                <View className="pb-3">
                    <View className="flex flex-row items-center mb-2">
                        <Icon name="list" size={18} color={'white'} />
                        <Text className="ml-6 text-base font-bold text-white">Deskripsi</Text>
                    </View>

                    <HTML
                        source={{ html: cleanText(htmlContent) }}
                        contentWidth={windowWidth}

                    />
                </View>
            </View>
            <View className="relative px-6 bg-purple-600 pb-6">
                { 
                    isPlaying ? (
                        <Video
                            ref={videoRef}
                            source={{ uri: `${IMAGE_API}/${vi}` }} // Ganti URL_VIDEO_HERE dengan URL video yang ingin diputar
                            className="w-full h-[300px]"
                            resizeMode="cover"
                            paused={!isPlaying}
                            fullscreen={true}
                        />
                    ) : (
                        <View  className="w-full h-[300px] flex items-center justify-center bg-purple-800">
                            <Icons name={!isPlaying ? 'file-movie-o' : 'file-movie-o'} size={100} color={'#dedede'} />
                        </View>
                    )
                }
                
                
                <TouchableOpacity 
                    onPress={togglePlay} 
                    className="flex flex-row items-center justify-center px-6 py-4 bg-purple-700"
                >
                    <Icons name={isPlaying ? 'pause-circle' : 'play-circle'} size={30} />
                    <Text className="font-medium text-base ml-6 text-white">{isPlaying ? 'STOP' : 'PUTAR'}</Text>
                </TouchableOpacity>
            </View>
        </ScrollView>
    )
}

export default Detailpermainan