import express from 'express';
import { createServer } from "http";
import { Server as SocketServer } from 'socket.io';
import mysql from 'mysql';

const app = express();
const httpServer = createServer(app);
const io = new SocketServer(httpServer, {
    cors: { 
        // origin: "https://nav-app-prod6-bhhbpeznua-as.a.run.app",
        // methods: ["GET", "POST"]
        origin: "*",
    }
});

const connection = mysql.createConnection({
    // host: '34.87.72.140',
    // user: 'root',
    // password: 'admin123',
    // database: 'project_webapp'
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'project_webapp'
});

connection.connect(err => {
    if (err) {
        console.error('Error connecting to MySQL database: ' + err.stack);
        return;
    }
    console.log('Connected to MySQL database');
});

async function queryDatabase(query, params) {
    return new Promise((resolve, reject) => {
        connection.query(query, params, (error, results) => {
            if (error) {
                reject(error);
            } else {
                resolve(results.reverse());
            }
        });
    });
}

async function getLatestData(dataUserId) {
    const query = 'SELECT * FROM data_livetests WHERE user_id = ? ORDER BY id DESC LIMIT 80';
    return queryDatabase(query, [dataUserId]);
}

async function getDataWebInp(dataUserId) {
    const query = 'SELECT user_id, server_address, test_id FROM input_wbtests WHERE user_id = ? ORDER BY id DESC LIMIT 1';
    return queryDatabase(query, [dataUserId]);
}

async function getDataWebTest(dataUserId) {
    const query = 'SELECT user_id, server_address, input_test_id FROM data_wbtests WHERE user_id = ? ORDER BY id DESC LIMIT 1';
    return queryDatabase(query, [dataUserId]);
}

async function getDataLoadInp(dataUserId) {
    const query = 'SELECT user_id, server_address, test_id FROM input_loadtests WHERE user_id = ? ORDER BY id DESC LIMIT 1';
    return queryDatabase(query, [dataUserId]);
}

async function getDataLoadTest(dataUserId) {
    const query = 'SELECT user_id, server_address, input_test_id FROM data_loadtests WHERE user_id = ? ORDER BY id DESC LIMIT 1';
    return queryDatabase(query, [dataUserId]);
}

io.on('connection', socket => {
    console.log('Connection');

    socket.on('sendDataUserId', dataUserId => {
        console.log('Data user ID received:', dataUserId);
        socket.data.dataUserId = dataUserId;
        socket.emit('dataUserIdAcknowledged');
        
        initializeDataTransmission(socket, dataUserId);
    });

    socket.on('disconnect', () => {
        console.log('Disconnect');
        clearInterval(socket.updateInterval);
        clearInterval(socket.updateIntervalwbinp);
        clearInterval(socket.updateIntervalwb);
        clearInterval(socket.updateIntervalloadinp);
        clearInterval(socket.updateIntervalload);
    });
});

async function initializeDataTransmission(socket, dataUserId) {
    try {
        const initialData = await getLatestData(dataUserId);
        socket.emit('data', initialData);

        socket.updateInterval = setInterval(async () => {
            const latestData = await getLatestData(dataUserId);
            socket.emit('data', latestData);
        }, 1000);

        const initialDatawbinp = await getDataWebInp(dataUserId);
        socket.emit('datawbtestinp', initialDatawbinp);

        socket.updateIntervalwbinp = setInterval(async () => {
            const latestDatawbinp = await getDataWebInp(dataUserId);
            socket.emit('datawbtestinp', latestDatawbinp);
        }, 100);

        const initialDatawb = await getDataWebTest(dataUserId);
        socket.emit('datawbtest', initialDatawb);

        socket.updateIntervalwb = setInterval(async () => {
            const latestDatawb = await getDataWebTest(dataUserId);
            socket.emit('datawbtest', latestDatawb);
        }, 100);

        const initialDataloadinp = await getDataLoadInp(dataUserId);
        socket.emit('dataloadtestinp', initialDataloadinp);

        socket.updateIntervalloadinp = setInterval(async () => {
            const latestDataloadinp = await getDataLoadInp(dataUserId);
            socket.emit('dataloadtestinp', latestDataloadinp);
        }, 100);

        const initialDataload = await getDataLoadTest(dataUserId);
        socket.emit('dataloadtest', initialDataload);

        socket.updateIntervalload = setInterval(async () => {
            const latestDataload = await getDataLoadTest(dataUserId);
            socket.emit('dataloadtest', latestDataload);
        }, 100);
    } catch (error) {
        console.error('Error fetching data from MySQL database: ' + error);
    }
}

httpServer.listen(3000, () => {
    console.log('Server is running');
});
