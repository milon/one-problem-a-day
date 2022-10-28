---
extends: _layouts.post
section: content
title: All elements in two binary search trees
problemUrl: https://leetcode.com/problems/all-elements-in-two-binary-search-trees/
date: 2022-10-28
categories: [tree]
---

We will inorder traverse both tree to get the sorted list of elements in both trees. We will merge the two sorted lists into one sorted list.

```python
class Solution:
    def getAllElements(self, root1: TreeNode, root2: TreeNode) -> List[int]:
        def inorder(root):
            if not root: 
                return []
            return inorder(root.left)+[root.val]+inorder(root.right)
        
        lst1 = inorder(root1)
        lst2 = inorder(root2)
        
        i1, i2, res = 0, 0, []
        s1, s2 = len(lst1), len(lst2)
        
        while i1 < s1 and i2 < s2:
            if lst1[i1] < lst2[i2]:
                res += [lst1[i1]]
                i1 += 1
            else:
                res += [lst2[i2]]
                i2 += 1
                
        return res + lst1[i1:] + lst2[i2:]
```

Time complexity: `O(n1+n2)`, n1 and n2 are the number of nodes in the tree <br/>
Space complexity: `O(h1+h1)`, h1 and h2 are the height of the tree