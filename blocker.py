from flask import Flask, request
import os

app = Flask(__name__)

@app.route("/block/", methods=['POST'])
def block():
    print(request.data)
    data = request.get_json(force=True)
    if data['token'] == 'secretcode':
        ip = data['ip']
        print(ip)
        print('/sbin/iptables -I INPUT -s ' + data['ip'] + ' -j DROP')
        os.system('/sbin/iptables -I INPUT -s ' + data['ip'] + ' -j DROP')
        return "success"
    print(data['token'])

if __name__ == '__main__':
    app.run(host='0.0.0.0')
