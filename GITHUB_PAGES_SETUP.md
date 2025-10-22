# 🚀 Configuração do GitHub Pages

Este guia explica como configurar o GitHub Pages para hospedar a página estática do projeto ODS03.

## 📋 Pré-requisitos

- Repositório GitHub criado
- Arquivos na pasta `docs/` commitados

## ⚙️ Configuração no GitHub

### 1. Acesse as Configurações do Repositório
1. Vá para o seu repositório no GitHub
2. Clique em **Settings** (Configurações)
3. Role para baixo até encontrar **Pages** no menu lateral

### 2. Configure o GitHub Pages
1. Em **Source** (Fonte), selecione **Deploy from a branch**
2. Em **Branch**, selecione **main**
3. Em **Folder**, selecione **/ docs**
4. Clique em **Save** (Salvar)

### 3. Configure as Permissões (Importante!)
1. Ainda em **Settings**, vá para **Actions** > **General**
2. Em **Workflow permissions**, selecione:
   - ✅ **Read and write permissions**
   - ✅ **Allow GitHub Actions to create and approve pull requests**
3. Clique em **Save**

### 4. Execute o Workflow
1. Vá para a aba **Actions** do seu repositório
2. Você verá o workflow **Deploy to GitHub Pages**
3. Se não executou automaticamente, clique em **Run workflow**

## 🌐 Acessando o Site

Após alguns minutos, seu site estará disponível em:
```
https://seu-usuario.github.io/project-ods03-uj/
```

## 🔧 Personalização

### Domínio Customizado (Opcional)
1. Crie um arquivo `CNAME` na pasta `docs/`
2. Adicione apenas o seu domínio (ex: `meusite.com`)
3. Configure os DNS do seu domínio para apontar para GitHub Pages

### Atualizações Automáticas
- Qualquer push para a branch `main` atualizará automaticamente o site
- O workflow GitHub Actions é executado automaticamente

## 📁 Estrutura de Arquivos Criados

```
docs/
├── index.html          # Página principal
├── styles.css          # Estilos customizados
├── favicon.svg         # Ícone do site
├── robots.txt          # Configuração para SEO
├── sitemap.xml         # Mapa do site
├── 404.html           # Página de erro 404
└── CNAME.example      # Exemplo para domínio customizado
```

## 🐛 Solução de Problemas

### Site não carrega
- Verifique se o workflow foi executado com sucesso
- Confirme que os arquivos estão na pasta `docs/`
- Aguarde até 10 minutos para propagação

### Workflow falha
- Verifique as permissões em Settings > Actions
- Confirme que o arquivo `.github/workflows/pages.yml` existe
- Verifique os logs na aba Actions

### 404 personalizado não funciona
- Confirme que o arquivo `404.html` está na pasta `docs/`
- Aguarde a próxima execução do workflow

## 📞 Suporte

Se encontrar problemas, verifique:
1. [Documentação oficial do GitHub Pages](https://docs.github.com/en/pages)
2. Logs na aba Actions do seu repositório
3. Issues neste repositório