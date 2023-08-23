import React, { 
    useEffect, 
    useState
} from 'react';
import { 
    View, 
    Text,
    StatusBar,
    TouchableOpacity,
    Image,
    Dimensions,
    Modal,
    ScrollView
} from 'react-native';
import Icon from "react-native-vector-icons/Feather";
import AsyncStorage from '@react-native-async-storage/async-storage';

import { PacmanIndicator } from 'react-native-indicators';
import PLAYER_API from './../api/DataApi';
import IMAGE_API from './../api/ImageApi';
const windowWidth = Dimensions.get('window').width;
const windowHeight = Dimensions.get('window').height;


const listPermainan = require('./../../assets/icons/score.png');
const quizPermainan = require('./../../assets/icons/choose.png');
const controllerPermainan = require('./../../assets/icons/controller.png');
const apiPermainan = require('./../../assets/icons/api.png');
const logoAplikasi = require('./../../assets/logoapp.png');

const Listmenu = ({navigation}) => {
    const [modalVisible, setModalVisible] = useState(false);
    const [loading, setLoading] = useState(true);
    const [dataplayer, setdataplayer] = useState('');
    useEffect(() => {
        ambildataPlayer()
    }, [])

    async function ambildataPlayer() {
        const cek = await AsyncStorage.getItem('siPlayer');
        fetch(`${PLAYER_API}/cekLogin/${cek}`)
            .then(response => response.json())
            .then(data => {
                setLoading(false)
                if (data.code == 200) {
                    setdataplayer(data.data)
                }
            })
            .catch(error => {
                setLoading(false)
                console.log(error);
            });
    }

    const tentangAplikasi1 = `Aplikasi permainan tradisional khas Indonesia menghadirkan keajaiban budaya dalam genggamanmu. Melalui layar ponselmu, wariskan keindahan zaman dulu kepada generasi masa kini. Sentuhan teknologi menjembatani masa lalu dan masa depan, menghidupkan kembali gemerlap senyum dan tawa di atas tanah nusantara. Ayo, mari leburkan zaman dalam keseruan permainan yang menerjang waktu, mengingatkan kita akan akar-akar kearifan lokal yang tak ternilai harganya.`
    const tentangAplikasi2 = `Apa yang membuat aplikasi ini begitu istimewa adalah kemampuannya untuk mengabadikan nilai-nilai luhur yang melekat dalam setiap permainan tradisional. Dalam tenggara angin layar sentuh, kita dapat merasakan semangat kebersamaan dari permainan seperti 'congklak', di mana setiap biji yang diambil dan diletakkan adalah sebuah langkah menuju kemenangan, sambil mengingatkan kita akan nilai kesederhanaan yang begitu berharga.`
    const tentangAplikasi3 = `Atau bayangkan membawa 'egrang', permainan khas Jawa yang melibatkan keterampilan dan keseimbangan. Dulu, anak-anak bergelantungan di atas potongan bambu tinggi, melangkah dengan penuh keyakinan. Kini, melalui aplikasi, generasi baru dapat merasakan sensasi itu tanpa harus pergi ke ladang atau pekarangan. Tetapi lebih dari itu, mereka juga dapat merasakan koneksi dengan leluhur mereka, dengan setiap langkah yang mereka ambil.`

   
    return (
        <View className="bg-purple-600">
            <StatusBar barStyle={'light-content'} backgroundColor={'transparent'} translucent />
            {
                loading ? (
                    <View className="absolute flex-1 w-full h-full items-center justify-center" style={{ backgroundColor: 'rgba(0,0,0,.2)' }}>
                        <StatusBar
                            barStyle={'dark-content'}
                            backgroundColor="transparent"
                            translucent
                        />
                        <PacmanIndicator color="#4f46e5" size={100} count={9} />
                    </View>
                ) : null
            }
            <View className="pt-[48px] px-6 bg-purple-800 pb-6">
                <View className="flex flex-row items-center">
                    <Image source={{ uri: `${IMAGE_API}/${dataplayer.avatar}` }} className="w-[60px] h-[60px] rounded-full" />
                    <View className="pl-6">
                        <Text className="text-2xl font-medium text-white uppercase">{dataplayer.nama}</Text>
                        <Text className="text-base font-medium text-white">{dataplayer.email}</Text>
                    </View>
                </View>
            </View>
            <View className="w-full p-6 flex justify-center" style={{ height: windowHeight - 100 }}>
                <View className="flex flex-row items-center justify-between mb-6">
                    <TouchableOpacity
                        onPress={() => navigation.navigate("Home")}
                        className={`flex w-[160px] items-center justify-center bg-yellow-500 rounded-lg p-6`}
                    >
                        <View className="w-[70px] h-[70px] flex items-center justify-center">
                            <Image source={listPermainan} className="w-[70px] h-[70px]" resizeMode='cover' />
                        </View>
                        <Text className="font-bold text-base text-slate-700">PERMAINAN</Text>
                    </TouchableOpacity>
                    <TouchableOpacity
                         onPress={() => navigation.navigate("Kuis")}
                        className={`flex w-[160px] items-center justify-center bg-yellow-500 rounded-lg p-6`}
                    >
                        <View className="w-[70px] h-[70px] flex items-center justify-center">
                            <Image source={controllerPermainan} className="w-[70px] h-[70px]" resizeMode='cover' />
                        </View>
                        <Text className="font-bold text-xl text-slate-700">GAME</Text>
                    </TouchableOpacity>
                </View>
                <View className="flex flex-row items-center justify-between mb-6">
                <TouchableOpacity
                         onPress={() => navigation.navigate("Profile")}
                        className={`flex w-[160px] items-center justify-center bg-yellow-500 rounded-lg p-6`}
                    >
                        <View className="w-[70px] h-[70px] flex items-center justify-center">
                            <Image source={apiPermainan} className="w-[70px] h-[70px]" resizeMode='cover' />
                        </View>
                        <Text className="font-bold text-xl text-slate-700">Profile</Text>
                    </TouchableOpacity>
                    <TouchableOpacity
                         onPress={() => setModalVisible(true)}
                        className={`flex w-[160px] items-center justify-center bg-yellow-500 rounded-lg p-6`}
                    >
                        <View className="w-[70px] h-[70px] flex items-center justify-center">
                            <Image source={apiPermainan} className="w-[70px] h-[70px]" resizeMode='cover' />
                        </View>
                        <Text className="font-bold text-base text-slate-700">TENTANG</Text>
                    </TouchableOpacity>
                   
                </View>
                
            </View>

            <Modal
                animationType="slide"
                transparent={true}
                visible={modalVisible}
            >
                <View className="flex-1 bg-purple-600">
                    <View className="flex flex-row items-center pt-12 px-6 pb-4 bg-purple-700">
                        <TouchableOpacity onPress={() => setModalVisible(false)}>
                            <Icon name="arrow-left" size={24} color={'white'} />
                        </TouchableOpacity>
                        <Text className="text-white font-bold text-2xl ml-8">TENTANG APLIKASI</Text>
                    </View>

                    <ScrollView className="p-6">
                        <View className="mb-6">
                            <Text className="text-base font-medium text-white">{tentangAplikasi1}</Text>
                        </View>
                        <View className="mb-6">
                            <Text className="text-base font-medium text-white">{tentangAplikasi2}</Text>
                        </View>
                        <View className="pb-[100px]">
                            <Text className="text-base font-medium text-white">{tentangAplikasi3}</Text>
                        </View>
                    </ScrollView>
                </View>
            </Modal>
        </View>
    )
}

export default Listmenu