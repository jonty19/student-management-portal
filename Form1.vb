Imports MySql.Data.MySqlClient

Public Class student_page
    Dim con As MySqlConnection
    Dim cm As MySqlCommand
    Public Shared userid = Nothing
    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        con = New MySqlConnection
        con.ConnectionString = "server= 127.0.0.1;userid= root;password= password;database=library"
        userid = TextBox1.Text
        Dim pass As String = TextBox2.Text
        Dim reader As MySqlDataReader
        Try
            con.Open()
            Dim Query As String
            Query = "select enrollment_no,password from library.student_list1 where enrollment_no= @user and password= @pass "
            cm = New MySqlCommand(Query, con)
            cm.Parameters.AddWithValue("user", userid)
            cm.Parameters.AddWithValue("pass", pass)
            reader = cm.ExecuteReader()
            Dim count As Integer
            While reader.Read
                count += 1
            End While
            If count = 1 Then
                If MessageBox.Show("successfully singed in...", "sing in page", MessageBoxButtons.OK, MessageBoxIcon.Information) = DialogResult.OK Then
                    Me.Hide()
                    Form3.Show()
                End If
            End If
            con.Close()
        Catch ex As MySqlException
            MessageBox.Show(ex.Message)
        Finally
            con.Dispose()
        End Try
    End Sub

    Private Sub Label4_MouseClick(sender As Object, e As MouseEventArgs) Handles Label4.MouseClick
        Me.Hide()
        Form2.Show()
    End Sub
End Class
