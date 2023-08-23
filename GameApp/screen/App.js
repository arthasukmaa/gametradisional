
import * as React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import {
    OnboardScreen,
    LoginScreen,
    RegisterScreen,
    HomeScreen,
    DetaildaerahScreen,
    DetailpermainanScreen,
    ListmenuScreen,
	KuisScreen,
    PilihlevelScreen,
    PuzzleScreen,
    SusungambarScreen,
    MulaikuisScreen,
    ProfileScreen,
    GameScreen,
} from "./";

const Stack = createNativeStackNavigator();

function App() {
    return (
        <NavigationContainer>
            <Stack.Navigator
                screenOptions={{ headerShown: false, }}
                initialRouteName={'Onboard'}
            >
                <Stack.Screen name="Onboard" component={OnboardScreen} />
                <Stack.Screen name="Login" component={LoginScreen} />
                <Stack.Screen name="Register" component={RegisterScreen} />
                <Stack.Screen name="Listmenu" component={ListmenuScreen} />
                <Stack.Screen name="Home" component={HomeScreen} />
                <Stack.Screen name="Detaildaerah" component={DetaildaerahScreen} />
                <Stack.Screen name="Detailpermainan" component={DetailpermainanScreen} />
                <Stack.Screen name="Kuis" component={KuisScreen} />
                <Stack.Screen name="Pilihlevel" component={PilihlevelScreen} />
                <Stack.Screen name="Puzzle" component={PuzzleScreen} />
                <Stack.Screen name="Susungambar" component={SusungambarScreen} />
                <Stack.Screen name="Mulaikuis" component={MulaikuisScreen} />
                <Stack.Screen name="Profile" component={ProfileScreen} />
                <Stack.Screen name="Game" component={GameScreen} />
            </Stack.Navigator>
        </NavigationContainer>
    );
}

export default App;