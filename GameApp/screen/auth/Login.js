import {
  View,
  Text,
  ImageBackground,
  Image,
  TouchableOpacity,
  StatusBar,
  TextInput,
  Alert
} from 'react-native';
import React, {useState, useEffect} from 'react';
import Icon from 'react-native-vector-icons/Feather';
import {PacmanIndicator} from 'react-native-indicators';
import AsyncStorage from '@react-native-async-storage/async-storage';
import PLAYER_API from './../api/DataApi';

const Login = ({navigation}) => {

  
  

  const [loading, setLoading] = useState(false);
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
  const sendLogin = async () => {

    setLoading(true)
    const formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);

    if(email.length == 0 && password.length == 0){
      setLoading(false)
      Alert.alert(`Pempadahan`, `Inputan tidak boleh kosong !`, [
        { text: 'OK' },
      ])
    }else{
      fetch(`${PLAYER_API}/login`, {
        method: 'POST',
        headers: {
            'Content-Type': 'multipart/form-data',
        },
        body: formData,
      })
      .then(response => response.json())
      .then(async function (data){
          if (data.code === 200) {
              setLoading(false)
              const id = JSON.stringify(data.data.id)
              await AsyncStorage.setItem('siPlayer', id);
              navigation.replace("Listmenu");
          } else {
              setLoading(false)
              Alert.alert(`${data.code}`, `${data.data}`, [
                  { text: 'OK' },
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
                  onPress: () => navigation.navigate('Login'),
              },
          ])
      });
    }
    

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
      className=" h-full w-full">
      <StatusBar
        barStyle={'dark-content'}
        backgroundColor={'transparent'}
        translucent
      />
      <View className="flex flex-row items-center px-6 pt-14">
        <TouchableOpacity onPress={() => navigation.goBack()}>
          <Icon name="arrow-left" size={24} color="#94a3b8" />
        </TouchableOpacity>
        <Text className="text-2xl font-bold text-slate-500 mx-12">Masuk</Text>
      </View>
      <View className="p-6 mt-[150px]">
        <View className="mb-3">
          <Text className="text-slate-600 font-medium text-base mb-2 ml-3">
            Email
          </Text>
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
            onPress={sendLogin}
            className="w-full items-center justify-center px-6 py-4 bg-indigo-600 rounded-md">
            <Text className="text-white font-medium text-base">MASUK</Text>
          </TouchableOpacity>
        </View>
      </View>
    </ImageBackground>
  );
};

export default Login;
