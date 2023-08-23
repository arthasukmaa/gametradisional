import React, { useState, useEffect } from 'react';
import {
    View,
    Text,
    Image,
    TouchableOpacity,
    StatusBar,
    TextInput,
    Alert,
    Modal,
    PermissionsAndroid
} from 'react-native';
import Icon from 'react-native-vector-icons/Feather';
import LinearGradient from 'react-native-linear-gradient';
import { PacmanIndicator } from 'react-native-indicators';
import AsyncStorage from '@react-native-async-storage/async-storage';
import PLAYER_API from './../api/DataApi';
import IMAGE_API from './../api/ImageApi';

const Profile = ({ navigation }) => {

    const ImagePicker = require('react-native-image-picker');
    const [dataplayer, setdataplayer] = useState('');
    const [loading, setLoading] = useState(true);

    const [avatarFocus, setAvatarFocus] = useState(false);
    const [modalUpdate, setmodalUpdate] = useState(false);

    const [nama, setNama] = useState('');
    const [namaFocus, setNamaFocus] = useState(false);
    const [email, setEmail] = useState('');
    const [emailFocus, setEmailFocus] = useState(false);
    const [password, setPassword] = useState('');
    const [passwordFocus, setPasswordFocus] = useState(false);
    const [icon, setIcon] = useState('eye-off');
    const [hidePassword, setHidePassword] = useState(true);

    function heandleShow() {
        hidePassword !== true
            ? (setIcon('eye'), setHidePassword(true))
            : (setIcon('eye-off'), setHidePassword(false));
    }
    // TOMBOL LOGIN
    const sendUpdateProfile = async () => {

        setLoading(true)
        const formData = new FormData();
        formData.append('nama', nama != '' ? nama : dataplayer.nama);
        formData.append('email', email != '' ? email : dataplayer.email);
        formData.append('password', password);

        fetch(`${PLAYER_API}/updatedataProfile/${dataplayer.id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'multipart/form-data',
            },
            body: formData,
        })
        .then(response => response.json())
        .then(async function (data) {
            if (data.code === 200) {
                setLoading(false)
                setmodalUpdate(false)
                Alert.alert(`${data.code}`, `${data.message}`, [
                    {
                        text: 'OK',
                        onPress: () => navigation.replace('Profile'),
                    },
                ])
            } else {
                setLoading(false)
                Alert.alert(`${data.code}`, `${data.message}`, [
                    {
                        text: 'MUAT ULANG',
                        onPress: () => navigation.replace('Profile'),
                    },
                ])
                setEmail('')
                setPassword('')
            }
        })
        .catch((error) => {
            setLoading(false)
            Alert.alert('404', `${error.message}`, [
                {
                    text: 'Muat Ulang',
                    onPress: () => navigation.replace('Profile'),
                },
            ])
        });


    }

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

    // Logout
    async function sendLogout(){
        const hapusSesi = await AsyncStorage.removeItem('siPlayer');
        navigation.replace("Onboard")
    }

    // Membuka Kamera

    const openKamera = async () => {
        try {
            const granted = await PermissionsAndroid.request(
                PermissionsAndroid.PERMISSIONS.CAMERA,
                {
                    title: 'Cool Photo App Camera Permission',
                    message:
                        'Cool Photo App needs access to your camera ' +
                        'so you can take awesome pictures.',
                    buttonNeutral: 'Ask Me Later',
                    buttonNegative: 'Cancel',
                    buttonPositive: 'OK',
                },
            );
            if (granted === PermissionsAndroid.RESULTS.GRANTED) {
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

                    if (res.didCancel) {
                        console.log('User cancelled image picker');
                    } else if (res.error) {
                        console.log('ImagePicker Error: ', res.error);
                    } else if (res.customButton) {
                        console.log('User tapped custom button: ', res.customButton);
                    } else {
                        setLoading(true)
                        const formData = new FormData();
                        formData.append('avatar', {
                            uri: res.assets[0].uri,
                            name: res.assets[0].fileName,
                            type: res.assets[0].type
                        });

                        fetch(`${PLAYER_API}/updateFoto/${dataplayer.id}`, {
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
                                    navigation.replace('Profile')
                                } else {
                                    Alert.alert(`${data.code}`, `${data.message}`, [
                                        { text: 'OK' },
                                    ])

                                }
                            })
                            .catch((error) => {
                                setLoading(false)
                                Alert.alert(`405`, `${error.message}`, [
                                    { text: 'OK' },
                                ])
                            });
                    }
                });
            } else {
                console.log('Camera permission denied');
            }
        } catch (err) {
            console.warn(err);
        }
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
        await ImagePicker.launchImageLibrary(options, (response) => {
            if (response.didCancel) {
                console.log('User cancelled photo picker');
            } else if (response.error) {
                console.log('ImagePicker Error: ', response.error);
            } else if (response.customButton) {
                console.log('User tapped custom button: ', response.customButton);
            } else {

                setAvatarFocus(false)

                setLoading(true)
                const formData = new FormData();
                formData.append('avatar', {
                    uri: response.assets[0].uri,
                    name: response.assets[0].fileName,
                    type: response.assets[0].type
                });

                fetch(`${PLAYER_API}/updateFoto/${dataplayer.id}`, {
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
                            navigation.replace('Profile')
                        } else {
                            Alert.alert(`${data.code}`, `${data.message}`, [
                                { text: 'OK' },
                            ])

                        }
                    })
                    .catch((error) => {
                        setLoading(false)
                        Alert.alert(`405`, `${error.message}`, [
                            { text: 'OK' },
                        ])
                    });
            }
        });
    }



    const originalText = dataplayer.password != undefined ? dataplayer.password : '$2y$10$McMEW2jrGv1/fCrb4lCYBemagu2E6OtPpiCg.ISiPiruCLWc8SK9K';
    const cutText = originalText.substring(45);
    const replacedText = cutText.replace(/./g, "*");

    return (
        <>
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
            <View className="pt-12 bg-purple-700 flex-1">
                <View className="flex flex-row items-center mx-6">
                    <TouchableOpacity
                        onPress={() => navigation.navigate("Listmenu")}
                        className="w-[57px] h-[57px] flex items-center justify-center bg-yellow-600 rounded-md border-2 border-slate-200"
                    >
                        <Icon name="arrow-left" size={24} color={'white'} />
                    </TouchableOpacity>
                    <Text className="flex items-center font-bold text-2xl text-white uppercase ml-12">Profile</Text>
                </View>
                <View className="flex items-center justify-center relative h-1/3">
                    <Image source={{ uri: `${IMAGE_API}/${dataplayer.avatar}` }} className="w-[110px] h-[110px] rounded-full" />
                    <TouchableOpacity
                        onPress={() => setAvatarFocus(true)}
                        className="absolute w-[45px] h-[45px] bg-yellow-600 border-4 border-purple-700 flex items-center justify-center rounded-full top-[50%] left-[55%]"
                    >
                        <Icon name="camera" size={20} color={'white'} />
                    </TouchableOpacity>
                </View>
                <View className="p-6">
                    <View className="flex flex-row items-center justify-between mb-6">
                        <View className="flex flex-row items-center">
                            <Icon name="user" size={24} color="white" />
                            <Text className="font-medium text-xl text-white mx-3">Nama</Text>
                        </View>
                        <Text className="font-medium text-xl text-white">{dataplayer.nama}</Text>
                    </View>
                    <View className="flex flex-row items-center justify-between mb-6">
                        <View className="flex flex-row items-center">
                            <Icon name="mail" size={24} color="white" />
                            <Text className="font-medium text-xl text-white mx-3">Email</Text>
                        </View>
                        <Text className="font-medium text-xl text-white">{dataplayer.email}</Text>
                    </View>
                    <View className="flex flex-row items-center justify-between mb-6">
                        <View className="flex flex-row items-center">
                            <Icon name="lock" size={24} color="white" />
                            <Text className="font-medium text-xl text-white mx-3">Password</Text>
                        </View>
                        <Text className="font-medium text-xl text-white">{replacedText}</Text>
                    </View>
                    <View className="flex my-6">
                        <TouchableOpacity
                            onPress={() => setmodalUpdate(!modalUpdate)}
                            className="flex items-center justify-center bg-yellow-600 px-6 py-4 rounded-md border-2 border-slate-200 mb-6"
                        >
                            <Text className="font-medium text-xl text-white uppercase">Edit Profile</Text>
                        </TouchableOpacity>
                        <TouchableOpacity
                            onPress={sendLogout}
                            className="w-full items-center justify-center px-6 py-4 bg-red-600 rounded-md border-2 border-slate-200">
                            <Text className="font-medium text-xl text-white uppercase">LOGOUT</Text>
                        </TouchableOpacity>
                    </View>
                </View>
            </View>
            <Modal
                animationType="fade"
                transparent={true}
                visible={avatarFocus}
                onRequestClose={() => {
                    setModalVisible(!avatarFocus);
                }}>
                <View className="w-full h-full top-0 flex items-center justify-end min-h-fit">
                    <StatusBar barStyle={'dark-content'} backgroundColor={'transparent'} translucent />
                    <View className="bg-purple-800 w-full h-auto rounded-t-[50px] shadow-2xl">
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
                                <Icon name="image" size={50} color={'grey'} />
                                <Text className="font-medium text-slate-400">Ambil Dari Galeri</Text>
                            </TouchableOpacity>
                            <TouchableOpacity
                                onPress={openKamera}
                                className="text-center items-center justify-center bg-slate-100 p-6 rounded-md "
                            >
                                <Icon name="camera" size={50} color={'grey'} />
                                <Text className="font-medium text-slate-400">Gunakan Kamera</Text>
                            </TouchableOpacity>
                        </View>
                    </View>
                </View>
            </Modal>
            <Modal
                animationType="fade"
                transparent={true}
                visible={modalUpdate}
                onRequestClose={() => {
                    setModalVisible(!modalUpdate);
                }}>
                <View className="w-full h-full top-0 flex items-center justify-end min-h-fit" style={{ backgroundColor: 'rgba(0,0,0,0.3)' }}>
                    <StatusBar barStyle={'dark-content'} backgroundColor={'transparent'} translucent />
                    <View className="bg-purple-800 w-full h-auto rounded-t-[50px] shadow-2xl">
                        <TouchableOpacity
                            className="w-full h-14 items-center justify-center rounded-md"
                            onPress={() => setmodalUpdate(!modalUpdate)}
                        >
                            <Text className="block w-12 h-1 bg-slate-400 rounded-full"></Text>
                        </TouchableOpacity>
                        <View className="p-6">
                        <View className="mb-3">
                                <Text className="text-white font-medium text-base mb-2 ml-3">
                                    Nama
                                </Text>
                                <View className="relative">
                                    <View className="absolute top-[2px] w-[50px] h-[50px] items-center justify-center rounded-full z-10">
                                        <Icon
                                            name="user"
                                            size={24}
                                            color={`${namaFocus === true || nama != 0 ? '#4f46e5' : '#94a3b8'
                                                }`}
                                        />
                                    </View>
                                    <TextInput
                                        className={`rounded-full pl-[62px] text-slate-600 h-[55px] ${namaFocus == true || nama != 0
                                                ? 'bg-white border-2 border-indigo-600'
                                                : 'bg-slate-100 border-2 border-slate-300'
                                            }`}
                                            placeholder={dataplayer.nama}
                                        placeholderTextColor={'#94a3b8'}
                                        onChangeText={val => setNama(val)}
                                        onFocus={() => setNamaFocus(true)}
                                        onBlur={() => setNamaFocus(false)}
                                    />
                                </View>
                            </View>
                            <View className="mb-3">
                                <Text className="text-white font-medium text-base mb-2 ml-3">
                                    Email
                                </Text>
                                <View className="relative">
                                    <View className="absolute top-[2px] w-[50px] h-[50px] items-center justify-center rounded-full z-10">
                                        <Icon
                                            name="mail"
                                            size={24}
                                            color={`${emailFocus === true || email != 0 ? '#4f46e5' : '#94a3b8'
                                                }`}
                                        />
                                    </View>
                                    <TextInput
                                        className={`rounded-full pl-[62px] text-slate-600 h-[55px] ${emailFocus == true || email != 0
                                                ? 'bg-white border-2 border-indigo-600'
                                                : 'bg-slate-100 border-2 border-slate-300'
                                            }`}
                                        placeholder={dataplayer.email}
                                        placeholderTextColor={'#94a3b8'}
                                        onChangeText={val => setEmail(val)}
                                        onFocus={() => setEmailFocus(true)}
                                        onBlur={() => setEmailFocus(false)}
                                    />
                                </View>
                            </View>
                            <View className="mb-3">
                                <Text className="text-white font-medium text-base mb-2 ml-3">
                                    Password Baru
                                </Text>
                                <View className="relative">
                                    <View className="absolute top-[2px] w-[50px] h-[50px] items-center justify-center rounded-full z-10">
                                        <Icon
                                            name="lock"
                                            size={24}
                                            color={`${passwordFocus === true || password != 0
                                                    ? '#4f46e5'
                                                    : '#94a3b8'
                                                }`}
                                        />
                                    </View>
                                    <TextInput
                                        className={`rounded-full pl-[62px] text-slate-600 h-[55px] ${passwordFocus == true || password.length != 0
                                                ? 'bg-white border-2 border-indigo-600'
                                                : 'bg-slate-100 border-2 border-slate-300'
                                            }`}
                                        placeholder="Masukan password baru ..."
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
                                    onPress={sendUpdateProfile}
                                    className="w-full items-center justify-center px-6 py-4 bg-yellow-600 rounded-md border-2 border-slate-200">
                                    <Text className="text-white font-medium text-base">EDIT PROFILE</Text>
                                </TouchableOpacity>
                                
                            </View>
                        </View>
                    </View>
                </View>
            </Modal>
        </>
    )
}

export default Profile