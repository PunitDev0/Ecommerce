import pyusb;

# Initialize USB device
dev = pyusb.find_idVendor_and_deviceAddress()  # Replace with your device ID

# Reset USB device
dev.reset()  # This command may perform a hardware reset

# Release USB device
dev.release()  # This command may release the device from PyUSB