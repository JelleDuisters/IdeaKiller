/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
var app = {
    // Application Constructor
    initialize: function() {
        this.bindEvents();
    },
    // Bind Event Listeners
    //
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    // deviceready Event Handler
    //
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicity call 'app.receivedEvent(...);'
    onDeviceReady: function() {
        app.receivedEvent('deviceready');
		
		listenToSensor();
		
		while (start == true)
		{
			if(acceleration.y > 7){
				$('body').css('background', 'red !important');
			}else {
				$('body').css('background', 'none !important');
			}
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
    },
    // Update DOM on a Received Event
    receivedEvent: function(id) {
        var parentElement = document.getElementById(id);
        var listeningElement = parentElement.querySelector('.listening');
        var receivedElement = parentElement.querySelector('.received');

        listeningElement.setAttribute('style', 'display:none;');
        receivedElement.setAttribute('style', 'display:block;');

        console.log('Received Event: ' + id);
    }
};

function listenToSensor() {
		
	// The watch id references the current `watchAcceleration`
	var watchID = null;

	// Wait for device API libraries to load
	//
	document.addEventListener("deviceready", onDeviceReady, false);

	// device APIs are available
	//
	function onDeviceReady() {
		startWatch();
	}

	// Start watching the acceleration
	//
	function startWatch() {

		// Update acceleration every 3 seconds
		var options = { frequency: 300 };

		watchID = navigator.accelerometer.watchAcceleration(onSuccess, onError, options);
	}

	// Stop watching the acceleration
	//
	function stopWatch() {
		if (watchID) {
			navigator.accelerometer.clearWatch(watchID);
			watchID = null;
		}
	}

	// onSuccess: Get a snapshot of the current acceleration
	//
	function onSuccess(acceleration) {
		var element = document.getElementById('accelerometer');
		element.innerHTML = 'Acceleration X: ' + acceleration.x         + '<br />' +
							'Acceleration Y: ' + acceleration.y         + '<br />' +
							'Acceleration Z: ' + acceleration.z         + '<br />' +
							'Timestamp: '      + acceleration.timestamp + '<br />';
	}

	// onError: Failed to get the acceleration
	//
	function onError() {
		alert('onError!');
	}
}
