# VM ip address

ip = "192.168.33.33"

env = {
    ip: ip,
    APP_URL: "http://" + ip + "/",
    APP_NAME: 'Symfony',
    PROJECT_NAME: "Symfony"
}

Vagrant.configure("2") do |config|
    config.vm.box = "ubuntu/bionic64"

    config.vm.network "private_network", ip: ip

    config.vm.provider "virtualbox" do |vb|
        vb.memory = "6000"
    end

    config.vm.synced_folder ".", "/vagrant", disabled: true
    config.vm.synced_folder ".", "/var/www/app/", create: true, rsync__exclude: "./code/var*"

    config.vm.provision "shell", path: "./provisions/bootstrap.sh", env: env
    config.vm.provision "shell", path: "./provisions/init.sh",      env: env
    config.vm.provision "shell", path: "./provisions/startup.sh",   env: env, run: "always", privileged: false
end