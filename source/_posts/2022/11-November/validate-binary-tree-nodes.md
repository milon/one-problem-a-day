---
extends: _layouts.post
section: content
title: Validate binary tree nodes
problemUrl: https://leetcode.com/problems/validate-binary-tree-nodes/
date: 2022-11-28
categories: [tree]
---

We will first find the root of the tree. Then we will traverse the tree and check if we can reach all the nodes from the root. We will use BFS to traverse. If we can reach all the nodes, then the tree is valid.

```python
class Solution:
    def validateBinaryTreeNodes(self, n: int, leftChild: List[int], rightChild: List[int]) -> bool:
        childs = set(leftChild + rightChild)
        
        root = 0
        for i in range(n):
            if i not in childs:
                root = i
                break
        
        visited = []
        queue = collections.deque([root])
        while queue:
            ele = queue.pop()
            
            if ele in visited:
                return False
            
            visited.append(ele)
            
            if leftChild[ele] != -1:
                queue.appendleft(leftChild[ele])
            
            if rightChild[ele] != -1:
                queue.appendleft(rightChild[ele])
            
        return len(visited) == n
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`
