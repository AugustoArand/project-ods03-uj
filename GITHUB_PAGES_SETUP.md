# 🚀 Configuração do GitHub Pages

Este guia explica como configurar o GitHub Pages para hospedar a página estática do projeto ODS03.

## 📋 Pré-requisitos

- Repositório GitHub criado
- Arquivos na pasta `docs/` commitados

## ⚙️ Configuração no GitHub

### PASSO 1: Habilitar GitHub Pages
1. Vá para o seu repositório no GitHub
2. Clique em **Settings** (Configurações)
3. Role para baixo até encontrar **Pages** no menu lateral
4. Em **Source** (Fonte), selecione **GitHub Actions**
5. Clique em **Save** (Salvar)

### PASSO 2: Configurar Permissões (MUITO IMPORTANTE!)
1. Ainda em **Settings**, vá para **Actions** > **General**
2. Em **Workflow permissions**, selecione:
   - ✅ **Read and write permissions**
   - ✅ **Allow GitHub Actions to create and approve pull requests**
3. Clique em **Save**

### PASSO 3: Configurar o Environment
1. Em **Settings**, vá para **Environments**
2. Clique em **New environment**
3. Nome: `github-pages`
4. Em **Deployment branches**, selecione **Selected branches**
5. Adicione a regra para `main`
6. Clique em **Save protection rules**

### PASSO 4: Verificar o Workflow
1. Vá para a aba **Actions** do seu repositório
2. Você deve ver os workflows disponíveis
3. Execute manualmente clicando em **Run workflow** se necessário

## 🌐 Acessando o Site

Após alguns minutos, seu site estará disponível em:
```
https://augustoarand.github.io/project-ods03-uj/
```

## 🐛 Solução de Problemas

### Erro "Get Pages site failed"
Este erro geralmente ocorre quando:

1. **Pages não está habilitado**: 
   - Vá em Settings > Pages
   - Selecione "GitHub Actions" como fonte

2. **Permissões insuficientes**:
   - Settings > Actions > General
   - Marque "Read and write permissions"

3. **Environment não configurado**:
   - Settings > Environments
   - Crie o environment "github-pages"

### Se ainda não funcionar:
1. Delete os arquivos `.github/workflows/pages.yml`
2. Use apenas o `static.yml`
3. Ou configure manualmente:
   - Settings > Pages
   - Source: "Deploy from a branch"
   - Branch: "main"
   - Folder: "/ docs"

## 📁 Arquivos de Workflow Disponíveis

Criamos múltiplos workflows para garantir que um funcione:

- **`simple.yml`** - Workflow mais simples (RECOMENDADO)
- **`alternative.yml`** - Sem usar configure-pages
- **`pages.yml`** - Workflow padrão com enablement=true
- **`static.yml`** - Workflow estático com enablement=true

## 🔄 Comandos Git para Atualizar

```bash
git add .
git commit -m "Add multiple workflow options for GitHub Pages"
git push origin main
```

## 🚀 Testando os Workflows

1. Após fazer push, vá para **Actions** no GitHub
2. Você verá múltiplos workflows
3. Execute manualmente o **"Simple GitHub Pages Deploy"** primeiro
4. Se não funcionar, tente o **"Deploy to GitHub Pages (Alternative)"**

## ⚠️ Limpeza (Opcional)

Após encontrar o workflow que funciona, você pode deletar os outros arquivos .yml que não foram usados.

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