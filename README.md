# Exercise 8: Create and deploy Helm chart
[Create a helm chart](https://helm.sh/docs/helm/helm_create/) that combines the Kubernetes files necessary to deploy the
pi-calculator. Extract at least 1 variable from one of the templates and make it configurable by putting it in
values.yaml.

[Install helm](https://helm.sh/docs/intro/install/) on osx
```shell
brew install helm
```
For other operating systems follow the [Helm install guide](https://helm.sh/docs/intro/install/).

Create your helm chart
```shell
helm create .helm
```

Install your helm chart
```shell
helm upgrade --install --wait pi-calculator .helm
```

The `.helm/templates` directory can be emptied before putting your yaml files here. The `values.yaml` can be cleared
cleared as well, to start with a clean slate. 

Simulate load with `load-generator.sh` that keeps on making curl requests to http://pi-calculator.localhost/


## Useful commands
[Install helm](https://helm.sh/docs/intro/install/) on osx
```shell
brew install helm
```
For other operating systems follow the [Helm install guide](https://helm.sh/docs/intro/install/).

Create your helm chart
```shell
helm create .helm
```

Install your helm chart
```shell
helm upgrade --install --wait pi-calculator .helm
```

Uninstall your helm chart
```shell
helm uninstall pi-calculator
```

Build docker image
```shell
docker build -t pi-calculator:php-fpm .
```

Apply Kubernetes files
```shell
kubectl apply -f .kubernetes
```

Follow logs (debugging):
```shell
kubectl logs -f -l app.kubernetes.io/name=pi-calculator
```

View the status of pods
```shell
kubectl get pods
```

Delete/recreate pod. Whenever the ConfigMap is changed, the pods aren't
automatically reloading the new configuration. By deleting the pods they will
be created again and use the new ConfigMap
```shell
kubectl delete pods -l app.kubernetes.io/name=pi-calculator
```

Delete Kubernetes files
```shell
kubectl delete -f .kubernetes
```
