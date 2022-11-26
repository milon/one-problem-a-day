---
extends: _layouts.post
section: content
title: Spiral matrix IV
problemUrl: https://leetcode.com/problems/spiral-matrix-iv/
date: 2022-11-26
categories: [linked-list]
---

The idea to take from this, is how to rotate the direction in a concise way. Initially we start by adding 1 to the column, and 0 to the row (going right)

If we hit a wall/edge, we must swap the direction. The trick is to swap with: `xr, xc = xc, -xr`. This is because we are rotating the direction by 90 degrees. We can also do this by using a matrix, but this is more concise.

Let xr be the term we add to our r row in every move. <br/>
Let xc be the term we add to our c column in every move.

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    def spiralMatrix(self, m: int, n: int, head: Optional[ListNode]) -> List[List[int]]:
        r, c = 0, 0
        xr, xc = 0, 1
        
        matrix = [[-1 for _ in range(n)] for _ in range(m)]
        
        while head:
            matrix[r][c] = head.val
            
            if r+xr < 0 or r+xr >= m or c+xc < 0 or c+xc >= n or matrix[r+xr][c+xc] != -1:
                xr, xc = xc, -xr
            
            head = head.next
            r, c = r+xr, c+xc
        
        return matrix
```

Time complexity: `O(mn)`, m is the number of rows, n is the number of columns <br/>
Space complexity: `O(1)`, we are not using any extra space, just the matrix we are returning