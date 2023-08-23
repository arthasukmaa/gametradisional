import {
  View,
  Text,
  ImageBackground,
  TouchableOpacity,
  StatusBar,
  TextInput,
  Modal,
  Image,
  Alert,
  ScrollView
} from 'react-native';
import React, {useState} from 'react';
import Icon from 'react-native-vector-icons/Feather';
import{ PacmanIndicator } from 'react-native-indicators';
import PLAYER_API from './../api/DataApi';

const Register = ({navigation}) => {


    const ImagePicker = require('react-native-image-picker');
    
    const [nama, setNama] = useState('');
    const [namaFocus, setNamaFocus] = useState(false);
    const [email, setEmail] = useState('');
    const [emailFocus, setEmailFocus] = useState(false);
    const [password, setPassword] = useState('');
    const [passwordFocus, setPasswordFocus] = useState(false);
    const [icon, setIcon] = useState('eye-off');
    const [hidePassword, setHidePassword] = useState(true);

    const [avatar, setAvatar] = useState('');
    const [avatarFocus, setAvatarFocus] = useState(false);

    const [loading, setLoading] = useState(false);

    function heandleShow() {
        hidePassword !== true
        ? (setIcon('eye'), setHidePassword(true))
        : (setIcon('eye-off'), setHidePassword(false));
    }

    // FILE GAMBAR
    const [urlFile, setUrlFile] = useState('')
    const [namaFile, setNamaFile] = useState('')
    const [typeFile, settypeFile] = useState('')

    // Membuka Kamera

    const openKamera = async () => {
        var options = {
            title: 'Select Image',
            customButtons: [
              { 
                name: 'customOptionKey', 
                title: 'Choose file from Custom Option' 
              },
            ],
            storageOptions: {
              skipBackup: true,
              path: 'images',
            },
          };

          await ImagePicker.launchCamera(options, res => {
            console.log('Response = ', res);
            if (res.didCancel) {
              console.log('User cancelled image picker');
            } else if (res.error) {
              console.log('ImagePicker Error: ', res.error);
            } else if (res.customButton) {
              console.log('User tapped custom button: ', res.customButton);
            } else {
                setAvatar(res.assets[0].fileName)
                setUrlFile(res.assets[0].uri)
                setNamaFile(res.assets[0].fileName)
                settypeFile(res.assets[0].type)
                setAvatarFocus(false)
            }
          });
    }

    // MEMBUKA GALERI
    const openGaleri = async () => {
        const options = {
            quality: 1.0,
            mediaType: 'photo',
            storageOptions: {
              skipBackup: false,
            },
          };
        await ImagePicker.launchImageLibrary(options,  (response) =>{
            if (response.didCancel) {
                console.log('User cancelled photo picker');
            } else if (response.error) {
                console.log('ImagePicker Error: ', response.error);
            } else if (response.customButton) {
                console.log('User tapped custom button: ', response.customButton);
            }else{
                setAvatar(response.assets[0].fileName)
                setUrlFile(response.assets[0].uri)
                setNamaFile(response.assets[0].fileName)
                settypeFile(response.assets[0].type)
                setAvatarFocus(false)
            }
        });
    }

    function kirimRegistrasi() {

        
        setLoading(true)
        const formData = new FormData();
        formData.append('nama', nama);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('avatar', {
            uri: urlFile,
            name: namaFile,
            type: typeFile
        });

        if (
            nama != '' &&
            email != '' &&
            password != '' &&
            avatar != ''
        ) {
            fetch(`${PLAYER_API}/registrasi`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
                body: formData,
            })

            .then(response => response.json())
            .then(data => {
                setLoading(false)
                if (data.code === 200) {

                    setTimeout(() => {
                        
                        Alert.alert(`${data.code}`, `${data.message}`, [
                            { text: 'OK', onPress: () => navigation.replace('Login')},
                        ])
                        navigation.replace('Register')
                    }, 2000);
                } else {
                    Alert.alert(`${data.code}`, `${data.message}`, [
                        { text: 'OK'},
                    ])

                }
            })
            .catch((error) => {
                setLoading(false)
                Alert.alert(`405`, `${error.message}`, [
                    { text: 'OK'},
                ])
            });
        }else{
            Alert.alert('Peringatan !', "Inputan tidak boleh ada yang kosong !", [
                { text: 'OK' },
            ])
            setLoading(false)
        }

    }


    if (loading) {
        return (
            <View className="flex-1 bg-white items-center justify-center">
                <StatusBar barStyle={'dark-content'} backgroundColor="transparent" translucent />
                <PacmanIndicator color='#4f46e5' size={100} count={9} />
            </View>
        )
    }

    return (
        <>
        <ImageBackground source={require('./../../assets/bg.png')} className="bg-indigo-100 w-screen h-full">
            <StatusBar barStyle={'dark-content'} backgroundColor={'transparent'} translucent/>
            <View className="flex flex-col px-6 pt-14">
                <TouchableOpacity onPress={() => navigation.goBack()}>
                    <Icon name="arrow-left" size={24} color="#94a3b8" />
                </TouchableOpacity>
                <View className="mt-3">
                    <Text className="text-2xl font-bold text-slate-500 mx-12 mb-3 font-[PoppinsBlack]">Buat Akun</Text>
                    <Text className="text-base font-normal text-slate-500 mx-12">Silahkan buat akun untuk dapat memulai permainan !</Text>
                </View>
            </View>
            <ScrollView>
            <View className="p-6 mt-[30px]">
                <View className="mb-3">
                    <Text className="text-slate-600 font-medium text-base mb-2 ml-3">Nama</Text>
                    <View className="relative">
                        <View className="absolute top-[2px] w-[50px] h-[50px] items-center justify-center rounded-full z-10">
                            <Icon
                                name="user"
                                size={24}
                                color={`${namaFocus === true || nama != 0 ? '#4f46e5' : '#94a3b8'}`}
                            />    
                        </View>
                        <TextInput
                        className={`rounded-full pl-[62px] text-slate-600 h-[55px] ${
                            namaFocus == true || nama.length != 0
                            ? 'bg-white border-2 border-indigo-600'
                            : 'bg-slate-100 border-2 border-slate-300'
                        }`}
                        placeholder="Masukan nama ..."
                        placeholderTextColor={'#94a3b8'}
                        onChangeText={val => setNama(val)}
                        onFocus={() => setNamaFocus(true)}
                        onBlur={() => setNamaFocus(false)}
                        />
                    </View>
                </View>
                <View className="mb-3">
                    <Text className="text-slate-600 font-medium text-base mb-2 ml-3">Avatar</Text>
                    <View className="relative">
                        <View className="absolute top-[2px] w-[50px] h-[50px] items-center justify-center rounded-full z-10">
                            {
                                urlFile === '' ? (
                                <Icon
                                    name="image"
                                    size={24}
                                    color={`${avatarFocus === true || avatar != 0 ? '#4f46e5' : '#94a3b8'}`}
                                />) : (
                                    <Image source={{ uri: urlFile }} className="w-[35px] h-[35px] rounded-full" />
                                )
                            }
                        </View>
                        <TouchableOpacity
                        className={`rounded-full pl-[62px] text-slate-600 h-[55px] justify-center ${
                            avatarFocus == true || avatar != ''
                            ? 'bg-white border-2 border-indigo-600'
                            : 'bg-slate-100 border-2 border-slate-300'
                        }`}
                            onPress={() => setAvatarFocus(true)}
                        >
                            <Text className="text-slate-400">{ avatar }</Text>
                        </TouchableOpacity>
                    </View>
                </View>
                <View className="mb-3">
                    <Text className="text-slate-600 font-medium text-base mb-2 ml-3">Email</Text>
                    <View className="relative">
                        <View className="absolute top-[2px] w-[50px] h-[50px] items-center justify-center rounded-full z-10">
                        <Icon
                            name="mail"
                            size={24}
                            color={`${
                            emailFocus === true || email != 0 ? '#4f46e5' : '#94a3b8'
                            }`}
                        />
                        </View>
                        <TextInput
                        className={`rounded-full pl-[62px] text-slate-600 h-[55px] ${
                            emailFocus == true || email.length != 0
                            ? 'bg-white border-2 border-indigo-600'
                            : 'bg-slate-100 border-2 border-slate-300'
                        }`}
                        placeholder="Masukan email ..."
                        placeholderTextColor={'#94a3b8'}
                        onChangeText={val => setEmail(val)}
                        onFocus={() => setEmailFocus(true)}
                        onBlur={() => setEmailFocus(false)}
                        />
                    </View>
                </View>
                <View className="mb-3">
                    <Text className="text-slate-600 font-medium text-base mb-2 ml-3">
                        Password
                    </Text>
                    <View className="relative">
                        <View className="absolute top-[2px] w-[50px] h-[50px] items-center justify-center rounded-full z-10">
                        <Icon
                            name="lock"
                            size={24}
                            color={`${
                            passwordFocus === true || password != 0
                                ? '#4f46e5'
                                : '#94a3b8'
                            }`}
                        />
                        </View>
                        <TextInput
                        className={`rounded-full pl-[62px] text-slate-600 h-[55px] ${
                            passwordFocus == true || password.length != 0
                            ? 'bg-white border-2 border-indigo-600'
                            : 'bg-slate-100 border-2 border-slate-300'
                        }`}
                        placeholder="Masukan password ..."
                        placeholderTextColor={'#94a3b8'}
                        onChangeText={val => setPassword(val)}
                        onFocus={() => setPasswordFocus(true)}
                        onBlur={() => setPasswordFocus(false)}
                        secureTextEntry={hidePassword}
                        />
                        <TouchableOpacity
                        onPress={() => heandleShow()}
                        className="absolute top-[2px] w-[50px] h-[50px] items-center justify-center rounded-full z-10 right-0">
                        <Icon
                            name={icon}
                            size={24}
                            color={`${hidePassword ? '#94a3b8' : '#4f46e5'}`}
                        />
                        </TouchableOpacity>
                    </View>
                </View>
                <View className="mb-3 mt-6">
                    <TouchableOpacity
                        onPress={kirimRegistrasi}
                        className="w-full items-center justify-center px-6 py-4 bg-indigo-600 rounded-md">
                        <Text className="text-white font-medium text-base">Buat Akun</Text>
                    </TouchableOpacity>
                </View>
            </View>
            </ScrollView>

           
        </ImageBackground>
            <Modal
                animationType="fade"
                transparent={true}
                visible={avatarFocus}
                onRequestClose={() => {
                setModalVisible(!avatarFocus);
            }}>
                <View className="w-full h-full top-0 flex items-center justify-end min-h-fit">
                    <StatusBar barStyle={'dark-content'} backgroundColor={'transparent'} translucent/>
                    <View className="bg-white w-full h-auto rounded-t-[50px] shadow-2xl">
                        <TouchableOpacity
                        className="w-full h-14 items-center justify-center rounded-md"
                            onPress={() => setAvatarFocus(!avatarFocus)}
                        >
                            <Text className="block w-12 h-1 bg-slate-400 rounded-full"></Text>
                        </TouchableOpacity>
                        <View className="p-6 flex flex-row items-center justify-center gap-3">
                            <TouchableOpacity
                                onPress={openGaleri} 
                                className="text-center items-center justify-center bg-slate-100 p-6 rounded-md "
                            >
                                <Icon name="image"size={50} color={'grey'} />
                                <Text className="font-medium text-slate-400">Ambil Dari Galeri</Text>
                            </TouchableOpacity>
                            <TouchableOpacity 
                                onPress={openKamera}
                                className="text-center items-center justify-center bg-slate-100 p-6 rounded-md "
                            >
                                <Icon name="camera"size={50} color={'grey'} />
                                <Text className="font-medium text-slate-400">Gunakan Kamera</Text>
                            </TouchableOpacity>
                        </View>
                    </View>
                </View>
            </Modal>
        </>
    );
};

export default Register;
