Em um terminal, clone o repositório para a sua máquina local:

```
   git clone https://github.com/MatheusDuarteGalvao/api-meli-items.git
```

Acesse o diretório do projeto:

```
   cd api-meli-items
```

Copie o arquivo .env.example para .env:

```
   cp .env.example .env
```

Construa os contêineres Docker e inicie o ambiente de desenvolvimento:

```
   ./vendor/bin/sail up
```

Gere uma chave de aplicativo:

```
   ./vendor/bin/sail artisan key:generate
```

Execute as migrações do banco de dados:

```
   ./vendor/bin/sail artisan migrate
```

Crie um alias para o comando Sail para facilitar o uso (opcional):

   - Abra o arquivo ~/.bashrc (ou ~/.zshrc se você estiver usando o Zsh) em seu editor de texto preferido:

     ```
     nano ~/.bashrc
     ```

   - Adicione a seguinte linha ao final do arquivo para criar um alias:

     ```
     alias sail='bash vendor/bin/sail'
     ```

   - Salve e saia do arquivo.

   - Atualize o ambiente do shell:

     ```
     source ~/.bashrc
     ```

   Agora você pode usar o comando `sail` em vez de `./vendor/bin/sail`.

Acesse seu aplicativo Laravel em http://localhost.

Para executar vários comandos do Laravel usando o Sail:

- Para executar comandos do Artisan: `sail artisan seu-comando`
- Para executar comandos do Composer: `sail composer seu-comando`

Para parar os contêineres Docker e o ambiente de desenvolvimento:

```
sail down
```
