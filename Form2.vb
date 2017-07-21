Imports MySql.Data.MySqlClient
Public Class Form2
    Dim con As MySqlConnection
    Dim cm As MySqlCommand
    Public Shared user As String = Nothing
    Private Sub Label4_MouseClick(sender As Object, e As MouseEventArgs) Handles Label4.MouseClick
        Me.Hide()
        student_page.Show()
    End Sub

    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        con = New MySqlConnection
        con.ConnectionString = "server= 127.0.0.1;userid= root;password= password;database=library"
        Dim reader As MySqlDataReader
        Try
            con.Open()
            Dim Query As String
            user = TextBox1.Text
            Query = "select userid,password from library.admin_list where userid= @user and password= @pass "
            cm = New MySqlCommand(Query, con)
            cm.Parameters.AddWithValue("user", user)
            cm.Parameters.AddWithValue("pass", TextBox2.Text)
            reader = cm.ExecuteReader()
            Dim count As Integer
            While reader.Read
                count += 1
            End While
            If count = 1 Then
                If MessageBox.Show("successfully singed in...", "sing in page", MessageBoxButtons.OK, MessageBoxIcon.Information) = DialogResult.OK Then
                    Me.Hide()
                    Form5.Show()
                End If
            End If
            con.Close()
        Catch ex As MySqlException
            MessageBox.Show(ex.Message)
        Finally
            con.Dispose()
        End Try
    End Sub
End Class
