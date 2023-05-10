// JavaScript (main.js)
// Get DOM elements
const startButton = document.getElementById('startButton');
const endButton = document.getElementById('endButton');

// Create variables for stream and peer connection
let localStream;
let remoteStream;
let peerConnection;

// Add click event listener to startButton
startButton.addEventListener('click', async () => {
    try {
        // Get local media stream
        localStream = await navigator.mediaDevices.getUserMedia({ audio: true });
        // Display local media stream in an audio element
        const localAudio = new Audio();
        localAudio.srcObject = localStream;
        localAudio.autoplay = true;
        document.body.appendChild(localAudio);

        // Create a new peer connection
        peerConnection = new RTCPeerConnection();
        // Add local media stream to peer connection
        localStream.getTracks().forEach(track => {
            peerConnection.addTrack(track, localStream);
        });

        // Set up event listener for receiving remote media stream
        peerConnection.addEventListener('track', (event) => {
            remoteStream = event.streams[0];
            // Display remote media stream in an audio element
            const remoteAudio = new Audio();
            remoteAudio.srcObject = remoteStream;
            remoteAudio.autoplay = true;
            document.body.appendChild(remoteAudio);
        });

        // Create offer to initiate the call
        const offer = await peerConnection.createOffer();
        await peerConnection.setLocalDescription(offer);
       
        // Send the offer to the other peer (e.g. via a signaling server)
        // ...
    } catch (error) {
        console.error('Failed to start call:', error);
    }
});

// Add click event listener to endButton
endButton.addEventListener('click', () => {
    // Close the peer connection
    peerConnection.close();
    // Stop local media stream tracks
    localStream.getTracks().forEach(track => track.stop());
    // Stop remote media stream tracks
    remoteStream.getTracks().forEach(track => track.stop());
    // Remove audio elements
    document.body.removeChild(document.getElementsByTagName('audio')[0]);
    document.body.removeChild(document.getElementsByTagName('audio')[0]);
});