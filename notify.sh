TARGET=$1
PORT=$2
MODE=$3

echo "Attack reported-${TARGET}-${PORT}-${MODE}" | mail -s "Unauthorized Port Scan Alert" fahmi@it.it.student.pens.ac.id

curl --header "Content-Type: application/json" --request POST --data "{\"token\": \"secretcode\", \"ip\": \"${TARGET}\"}" http://192.168.0.113:5000/block/
