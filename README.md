# 🏥 Sistema ODS03 - Saúde e Bem-estar

[![Deploy to GitHub Pages](https://github.com/AugustoArand/project-ods03-uj/workflows/Deploy%20to%20GitHub%20Pages/badge.svg)](https://github.com/AugustoArand/project-ods03-uj/actions)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

**Sistema de acompanhamento da saúde desenvolvido para apoiar o ODS03 das Nações Unidas - "Saúde e Bem-estar"**

## 🌟 Sobre o Projeto

Este sistema foi desenvolvido com o objetivo de promover a **saúde e bem-estar** das pessoas, alinhado com o **Objetivo de Desenvolvimento Sustentável (ODS) 03** da ONU. O ODS03 busca "assegurar uma vida saudável e promover o bem-estar para todos, em todas as idades".

### 🎯 Objetivo Principal

Criar uma plataforma digital que auxilie indivíduos no controle e melhoria de seus hábitos de saúde, especialmente no combate ao tabagismo e na promoção de estilos de vida mais saudáveis.

## 📋 Funcionalidades

### 🚭 Controle de Consumo
- **Registro de consumo**: Acompanhamento diário do número de cigarros
- **Horário do primeiro cigarro**: Monitoramento de padrões de consumo
- **Observações personalizadas**: Notas sobre gatilhos e situações
- **Histórico detalhado**: Visualização da evolução ao longo do tempo

### 🏆 Sistema de Gamificação
- **Conquistas (Achievements)**: Sistema de recompensas por marcos alcançados
- **Desafios personalizados**: Metas semanais e mensais
- **Ranking geral**: Competição saudável entre usuários
- **Sistema de pontos**: Acúmulo de pontos por comportamentos positivos

### 👥 Funcionalidades Sociais
- **Grupos de apoio**: Criação e participação em grupos motivacionais
- **Parcerias**: Sistema de buddy/parceiro para apoio mútuo
- **Compartilhamento de conquistas**: Celebração de sucessos

### 🤖 Inteligência Artificial
- **Análise de padrões**: IA para identificar gatilhos e padrões de comportamento
- **Recomendações personalizadas**: Sugestões baseadas no perfil do usuário
- **Sessões de IA**: Conversas motivacionais e de apoio

### 📊 Relatórios e Análises
- **Dashboard personalizado**: Visão geral do progresso
- **Gráficos de evolução**: Visualização de dados ao longo do tempo
- **Relatórios de saúde**: Impactos positivos da mudança de hábitos

## 🛠️ Tecnologias Utilizadas

### Backend
- **Laravel 11.x** - Framework PHP robusto e elegante
- **MySQL/PostgreSQL** - Banco de dados relacional
- **PHP 8.2+** - Linguagem de programação

### Frontend
- **Blade Templates** - Sistema de templates do Laravel
- **Tailwind CSS** - Framework CSS utilitário
- **Alpine.js** - Framework JavaScript reativo
- **Vite** - Build tool moderno

### DevOps e Deployment
- **GitHub Pages** - Hospedagem da página de apresentação
- **GitHub Actions** - CI/CD para deployment automático
- **Docker** - Containerização da aplicação (opcional)

## 🗄️ Estrutura do Banco de Dados

### Principais Tabelas
- `users` - Usuários do sistema
- `user_profiles` - Perfis detalhados dos usuários
- `consumption_records` - Registros de consumo diário
- `daily_activities` - Atividades diárias dos usuários
- `achievements` - Conquistas disponíveis
- `user_achievements` - Conquistas dos usuários
- `challenges` - Desafios do sistema
- `groups` - Grupos de apoio
- `ai_sessions` - Sessões de IA com usuários
- `notifications` - Sistema de notificações

## 🚀 Instalação e Configuração

### Pré-requisitos
- PHP 8.2 ou superior
- Composer
- Node.js e npm
- MySQL ou PostgreSQL

### Passos para Instalação

1. **Clone o repositório**
   ```bash
   git clone https://github.com/AugustoArand/project-ods03-uj.git
   cd project-ods03-uj
   ```

2. **Instale as dependências do PHP**
   ```bash
   composer install
   ```

3. **Instale as dependências do Node.js**
   ```bash
   npm install
   ```

4. **Configure o ambiente**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure o banco de dados no arquivo `.env`**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ods03_health
   DB_USERNAME=seu_usuario
   DB_PASSWORD=sua_senha
   ```

6. **Execute as migrações**
   ```bash
   php artisan migrate
   ```

7. **Execute os seeders (opcional)**
   ```bash
   php artisan db:seed
   ```

8. **Compile os assets**
   ```bash
   npm run build
   ```

9. **Inicie o servidor de desenvolvimento**
   ```bash
   php artisan serve
   ```

## 🌐 Demo Online

Acesse a página de apresentação do projeto: [https://augustoarand.github.io/project-ods03-uj/](https://augustoarand.github.io/project-ods03-uj/)

## 📖 Sobre o ODS03

O **Objetivo de Desenvolvimento Sustentável 03** visa:

- Reduzir a mortalidade materna e infantil
- Combater doenças transmissíveis e não transmissíveis
- Promover saúde mental e bem-estar
- Reduzir o uso de substâncias nocivas
- Fortalecer sistemas de saúde
- Garantir acesso universal à saúde

### Como Este Projeto Contribui

✅ **Meta 3.a**: Fortalecer a implementação da Convenção-Quadro para Controle do Tabaco  
✅ **Meta 3.4**: Reduzir mortes prematuras por doenças não transmissíveis  
✅ **Meta 3.5**: Fortalecer prevenção e tratamento do abuso de substâncias  

## 👥 Contribuição

Contribuições são bem-vindas! Para contribuir:

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo `LICENSE` para mais detalhes.

## 🤝 Contato

**Augusto Arand** - Desenvolvedor Principal

- GitHub: [@AugustoArand](https://github.com/AugustoArand)
- LinkedIn: [Augusto Arand](https://linkedin.com/in/augustoarand)

## 🙏 Agradecimentos

- **Organização das Nações Unidas** pela definição dos ODS
- **Comunidade Laravel** pelo framework excepcional
- **Todos os colaboradores** que tornaram este projeto possível

---

<p align="center">
  <strong>🌍 Juntos por um mundo mais saudável e sustentável! 🌱</strong>
</p>

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
